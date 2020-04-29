<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 11:42
 */

namespace Lib\Models;
use Lib\Models\Exam_result;
use Lib\Models\User;
use PDO;


class Result
{
    protected $pdo;
    protected $fields;
    public $exam_date, $idstudent, $idexam, $exam_description, $idproces, $p_description;
    public $idassignment, $assignment_description, $idaspect, $aspect_description;
    public $assessors;

    public function __construct($db)
    {
        $this->pdo = $db;
        $this->assessors = [];
    }

    public function save() {
        try {
            $sql = "insert into result (exam_date, idstudent, idexam, idaspect) values (:exam_date, :idstudent, :idexam, :idaspect);";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":exam_date", $this->exam_date, PDO::PARAM_STR);
            $stmt->bindParam(":idstudent", $this->idstudent, PDO::PARAM_INT);
            $stmt->bindParam(":idexam", $this->idexam, PDO::PARAM_INT);
            $stmt->bindParam(":idaspect", $this->idaspect, PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function resultsByExam() {

        $sql = "select 
                r.exam_date,
                p.idproces, 
                p.description as proces_description, 
                ass.idassignment, 
                ass.description as assignment_description,
                ass.min_score,
                a.idaspect,
                a.description as aspect_description,
                a.score,
                er.comment,
                er.assessor1,
                er.assessor2
                from exam_result as er
                join result as r on er.idstudent = r.idstudent and er.exam_date = r.exam_date and er.idexam = r.idexam
                join aspect as a on r.idaspect = a.idaspect
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                where er.idexam = :idexam and er.idstudent = :idstudent and e.active = 1 and er.exam_date = :exam_date";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $this->idstudent, PDO::PARAM_INT);
        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
        $stmt->bindParam(':exam_date', $this->exam_date, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = [];
        $exam_score = 0;
        $grade = -1;
        foreach($stmt->fetchAll() as $p) {
            $result[$p["idproces"]]["description"] = $p["proces_description"];
            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["description"] = $p["assignment_description"];
            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["min_score"] = $p["min_score"];
            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["aspect_description"] = $p["aspect_description"];
            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["aspect_score"] = $p["score"];
            if($p['min_score'] > $p['score']) {
                //gezakt voor dit onderdeel
                $grade = "1,0";
            }
            if(!isset($result[$p["idproces"]]["proces_score"])) {
                $result[$p["idproces"]]["proces_score"] = 0;
            }
            $result[$p["idproces"]]["proces_score"] += $p["score"];
            $exam_score += $p["score"];
        }


        $examresult =  [
           // 'exam_result' => $exam_result,
            'result' => $result,
            'exam_score' => $exam_score,
            'grade' => $grade
        ];

        return $examresult;
    }

    public function resultsByExamStudentsWithAllAspects() {
        //Informatie over alle het gemaakte examen op een bepaalde datum
        $sql = "select 
                s.idstudent,
                s.first_name as student_firstname,
                s.last_name as student_lastname,
                s.prefix as student_prefix,
                s.idgroup,
                er.exam_date,
                e.idexam,
                e.description as exam_description,
                e.examcode as exam_code,
                p.idproces,
                p.description as proces_description,
                ass.idassignment,
                ass.description as assignment_description,
                ass.min_score,
                a.idaspect,
                a.description as aspect_description,
                a.score,
                er.comment,
                er.assessor1,
                concat(u1.first_name, ' ',  u1.last_name) as assessor1_fullname,
                er.assessor2,
                concat(u2.first_name, ' ',  u2.last_name) as assessor2_fullname,
                e.caesura
                from exam_result as er
                join student as s on er.idstudent = s.idstudent
                join exam as e on er.idexam = e.idexam
                join proces as p on p.idexam = e.idexam
                join assignment as ass on p.idproces = ass.idproces
                join aspect as a on ass.idassignment = a.idassignment
                join user as u1 on er.assessor1 = u1.iduser
                join user as u2 on er.assessor2 = u2.iduser
                where er.idexam = :idexam and er.idstudent = :idstudent and exam_date = :exam_date
                order by p.idproces, ass.idassignment, a.score";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
        $stmt->bindParam(':exam_date', $this->exam_date, PDO::PARAM_STR);
        $stmt->bindParam(':idstudent', $this->idstudent, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $examdata = $stmt->fetchAll();

        print_r($examdata);

        //Score van de student. De aspects die zijn aangegeven in het beoordelingsformulier.
        $sql = "select idaspect from result
                where idexam = :idexam and idstudent = :idstudent and exam_date = :exam_date";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
        $stmt->bindParam(':exam_date', $this->exam_date, PDO::PARAM_STR);
        $stmt->bindParam(':idstudent', $this->idstudent, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        foreach ($stmt->fetchAll() as $row) {
            $results[] = $row['idaspect'];
        };

        //$assessors = $this->getAssessorsByExamByDate();

        $examresults['idexam'] = $examdata[0]['idexam'];
        $examresults['idstudent'] = $examdata[0]['idstudent'];
        $examresults['student_fullname'] = $examdata[0]['student_firstname']." ".$examdata[0]['student_prefix']." ".$examdata[0]['student_lastname'];
        $examresults['idgroup'] = $examdata[0]['idgroup'];
        $examresults['exam_description'] = $examdata[0]['exam_description'];
        $examresults['exam_date'] = $examdata[0]['exam_date'];
        $examresults['exam_code'] = $examdata[0]['exam_code'];
        $examresults['comment'] = $examdata[0]['comment'];
        $examresults['assessor1_fullname'] = $examdata[0]['assessor1_fullname'];
        $examresults['assessor2_fullname'] = $examdata[0]['assessor2_fullname'];
        $examresults['assessor1'] = $examdata[0]['assessor1'];
        $examresults['assessor2'] = $examdata[0]['assessor2'];
//        $examresults['assessor1'] = $assessors[$examdata[0]['assessor1']]['fullname'];
//        $examresults['assessor2'] = $assessors[$examdata[0]['assessor2']]['fullname'];
        $examresults['caesura'] = explode(" ",$examdata[0]['caesura']);
        $examresults['criteria'] = 1;
        foreach($examdata as $r) {
            $proces[$r['idproces']]['proces_description'] = $r['proces_description'];
            $proces[$r['idproces']]['assignments'][$r['idassignment']]['assignment_description'] = $r['assignment_description'];
            $proces[$r['idproces']]['assignments'][$r['idassignment']]['min_score'] = $r['min_score'];
            if($r['min_score'] > 0) {
                $examresults['critical_assignments'][$r['idassignment']]['description'] = $r['assignment_description'];
                if(!$examresults['critical_assignments'][$r['idassignment']]['passed']) {
                    $examresults['critical_assignments'][$r['idassignment']]['passed'] = 1;
                }
            }
            $proces[$r['idproces']]['assignments'][$r['idassignment']]['aspects'][$r['idaspect']]['aspect_description'] = $r['aspect_description'];
            if(in_array($r['idaspect'], $results)) {
                $proces[$r['idproces']]['assignments'][$r['idassignment']]['aspects'][$r['idaspect']]['result'] = $r['score'];
                if($r['score'] < $r['min_score']) {
                    $examresults['criteria'] = -1;
                    $examresults['critical_assignments'][$r['idassignment']]['passed'] = -1;
                } else {
                    $proces[$r['idproces']]['proces_score'] += $r['score'];
                }
            } else {
                $proces[$r['idproces']]['assignments'][$r['idassignment']]['aspects'][$r['idaspect']]['result'] = -1;
            }
            $proces[$r['idproces']]['assignments'][$r['idassignment']]['aspects'][$r['idaspect']]['score'] = $r['score'];
            $proces[$r['idproces']]['assignments'][$r['idassignment']]['aspectcount'] = count($proces[$r['idproces']]['assignments'][$r['idassignment']]['aspects']);
        }
        $total_score = 0;
        foreach($proces as $p) {
            $total_score += $p['proces_score'];
        }
        if($examresults['criteria'] == -1) {
            $examresults['total_score'] = 0;
            $examresults['grade']  = $examresults['caesura'][0];
        } else {
            $examresults['total_score'] = $total_score;
            $examresults['grade']  = str_replace(",", ".", $examresults['caesura'][$total_score]);
            $examresults['letter_grade'] = $this->getLetterGrade($examresults['grade']);
        }
        $examresults['processes'] = $proces;
        print_r($examresults);
        return $examresults;
    }


    public function resultsByExamStudents($idstudent = "") {
        if(is_array($idstudent)) {
            $where_student = " and s.idstudent in (:idstudent)";
        } else if($idstudent != "") {
            $where_student = " and s.idstudent = :idstudent";
        } else if($idstudent == "") {
            $where_student = "";
        }
        //$where_student = ($idstudent == "") ? "" : " and s.idstudent = :idstudent";
        $sql = "select 
                er.idexam,
                e.examcode,
                s.idstudent as student_idstudent,
                s.idgroup,
                b.cohort,
                IF(ISNULL(prefix), CONCAT(s.first_name, ' ', s.last_name), CONCAT(s.first_name, ' ', prefix, ' ', s.last_name )) AS fullname,
                er.exam_date,
                e.description as exam_description,
                e.caesura as caesura,
                SUM(a.score) as total_score,
                SUM(CASE WHEN ass.min_score > a.score THEN 1 ELSE 0 END) as grade,
                er.assessor1,
                concat(u1.first_name, ' ',  u1.last_name) as assessor1_fullname,
                er.assessor2,
                concat(u2.first_name, ' ',  u2.last_name) as assessor2_fullname
                from exam_result as er
                join exam as e on er.idexam = e.idexam
                join student as s on er.idstudent = s.idstudent
                join result as r on er.idstudent = r.idstudent and er.exam_date = r.exam_date and er.idexam = r.idexam
                join aspect as a on a.idaspect = r.idaspect
                join assignment  as ass on a.idassignment = ass.idassignment
                join user as u1 on er.assessor1 = u1.iduser
                join user as u2 on er.assessor2 = u2.iduser
                join basegroup b on s.idgroup = b.idgroup
                where er.idexam = :idexam and e.active = 1 and er.exam_date = :exam_date". $where_student.
                " group by student_idstudent order by idgroup, exam_description, caesura, s.last_name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
        $stmt->bindParam(':exam_date', $this->exam_date, PDO::PARAM_STR);
        if($where_student != "") {
            $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
        }
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $this->getGrade(explode(" ",$result[0]['caesura']), $result, $this->getOccurencesUntilDate());
    }





    public function getGrade($caesura, $result, $attempts) {
        foreach($result as $key => $value) {
           // if($value['grade'] > 0) {
            //    $result[$key]['grade'] = "1,0";
           // } else {
            $result[$key]['grade'] = str_replace(",", ".", $caesura[$result[$key]['total_score']]);
            $result[$key]['letter_grade'] = $this->getLetterGrade($result[$key]['grade']);
           // }
            //$result[$key]['cohort'] = $this->getCohort($value['idgroup']);
            $result[$key]['attempt'] = $attempts[$result[$key]['student_idstudent']];
        }
        return $result;
    }

    public function getLetterGrade($grade) {
        $grade = str_replace(",", ".", $grade);
        if((float)$grade >= 8 ) {
            return "G";
        } else if((float)$grade >= 5.5) {
            return "V";
        } else {
            return "O";
        }

    }

    public function getCohort($idgroup) {
        $start_cohort =  "201".substr($idgroup,-2,1);
        $end_cohort = (int)$start_cohort + 1;
        return $start_cohort." / ".$end_cohort;
    }


    public function getExamDates() {
        $sql = "select distinct 
                r.exam_date
                from result as r
                join aspect as a on r.idaspect = a.idaspect
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                where e.active = 1 and e.idexam = :idexam
                group by exam_date, e.description
                order by r.exam_date;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return($stmt->fetchAll());
    }


    public function getOccurencesUntilDate() {
        $sql ="select 
                e. idexam, 
                r.exam_date,
                idstudent
                from result  as r
                join aspect as a on r.idaspect = a.idaspect
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                where e.idexam = :idexam and exam_date <= :exam_date
                group by r.exam_date, r.idstudent  order by r.idstudent, exam_date;";
      try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
            $stmt->bindParam(':exam_date', $this->exam_date, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
        $attempts = [];
        foreach($result as $s) {
            if(!isset($attempts[$s['idstudent']]['count'])) {
                $attempts[$s['idstudent']]['count'] = 0;
            }
            $attempts[$s['idstudent']]['count'] += 1;
        }
        //var_dump($attempts);
        return $attempts;
    }


    public function examResultsByStudent($idstudent) {
        $sql = "select
                e.description as exam_description,
                e.caesura as caesura,
                r.exam_date, 
                e.idexam,
                SUM(a.score) as score,
                SUM(CASE WHEN ass.min_score > a.score THEN 1 ELSE 0 END) as grade
                from result as r
                join aspect as a on r.idaspect = a.idaspect
                join student as s on r.idstudent = s.idstudent
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                where r.idstudent = :idstudent
                group by e.idexam, exam_description, caesura, r.exam_date
                order by soort, exam_description ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Result::class, [$this->db]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $r) {
            $caesura = explode(" ", $r['caesura']);
            $exams[$r['idexam']]['description'] = $r['exam_description'];
            //$exams[$r['idexam']]['attempt'][$r['exam_date']]['idaspect'] = $r['idaspect'];
            $exams[$r['idexam']]['attempt'][$r['exam_date']]['score'] = $r['score'];
            if($r['grade'] == 0) {
                $exams[$r['idexam']]['attempt'][$r['exam_date']]['grade'] = $caesura[$r['score']];
                $exams[$r['idexam']]['attempt'][$r['exam_date']]['letter_grade'] = $this->getLetterGrade($caesura[$r['score']]);
            } else {
                $exams[$r['idexam']]['attempt'][$r['exam_date']]['grade'] = "1,0";
                $exams[$r['idexam']]['attempt'][$r['exam_date']]['letter_grade'] = "O";
            }

            $grade = (float) str_replace(",", ".", $caesura[$r['score']]);
           if (!isset($exams[$r['idexam']]['highest_score'])) {
               $grade = (float) str_replace(",", ".", $caesura[$r['score']]);
               $exams[$r['idexam']]['highest_score'] = $grade;
               $exams[$r['idexam']]['highest_letter_score'] = $this->getLetterGrade($grade);
           } else if($exams[$r['idexam']]['highest_score'] < $grade) {
               $exams[$r['idexam']]['highest_score'] = $grade;
               $exams[$r['idexam']]['highest_letter_score'] = $this->getLetterGrade($grade);
           }
        }
        //$this->examgroupScores($exams);
        return $exams;
    }

    public function examgroupScores($exams) {
        $eg = array();

        $sql = "select description, soort from exam";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $examdescriptions = $stmt->fetchAll();
        foreach($examdescriptions as $i) {
            $idexamgroup = $this->getExamgroup($i['description']);
            $eg[$i['soort']][$idexamgroup]['aantal']++;
        }

        //print_r($eg);

        foreach($exams as $idexam => $i) {
            $idexamgroup = $this->getExamgroup($i['description']);
            $er[$idexamgroup]['scores'][] = $this->getLetterGrade($i['highest_score']);
            $er[$idexamgroup]['exams'][$idexam] = $i;
        }
        foreach($er as $idexamgroup => $group) {
            $v = 0;
            $g = 0;
            $total = "";

            //Er zijn nog geen resultaten voor alle examens in een examengroup
            if(count($group['scores']) < $eg[$idexamgroup]['aantal']) {
                $total = "O";
            }
            foreach($group['scores'] as $score) {
                if($score == "V") {
                    $v++;
                } elseif($score == "G") {
                    $g++;
                } else {
                    $total = "O";
                }
                if($total == "") {
                    if($g > $v) {
                        $total = "G";
                    } else {
                        $total = "V";
                    }
                }
            }
            $er[$idexamgroup]['total'] = $total;
        }
        return $er;
    }

    public function getExamgroup($exam_description) {
        return substr($exam_description, 0,5);
    }

    public function getAssessorsByExamByDate() {
        $sql = "(select assessor1 as assessor from exam_result
                where exam_date = :exam_date and idexam = :idexam) 
                union 
                (select assessor2 as assessor from exam_result
                where exam_date = :exam_date and idexam = :idexam)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
        $stmt->bindParam(':exam_date', $this->exam_date, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row) {
            $assessor_ids[] = $row['assessor'];
        }
        $u = new User($this->pdo);
        $assessors = $u->readByIds($assessor_ids);
        return $assessors;
    }

    public function getStudentExams($idstudent)
    {
        $sql = "select 
                er.idexam,
                er.exam_date
                from exam_result as er
                where er.idstudent = :idstudent";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
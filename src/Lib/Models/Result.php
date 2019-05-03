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
    public $idassignment, $assignement_description, $idaspect, $aspect_description;
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
            $stmt->bindParam(":exam_date", $this->exam_date, PDO::PARAM_INT);
            $stmt->bindParam(":idstudent", $this->idstudent, PDO::PARAM_INT);
            $stmt->bindParam(":idexam", $this->idexam, PDO::PARAM_INT);
            $stmt->bindParam(":idaspect", $this->idaspect, PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

//    public function delete() {
//        try {
//            $sql = "delete r from result as r
//                join aspect as a on r.idaspect = a.idaspect
//                join assignment as ass on a.idassignment = ass.idassignment
//                join proces as p on ass.idproces = p.idproces
//                join exam as e on p.idexam = e.idexam
//                where e.active = 1 and idstudent = :idstudent AND e.idexam = :idexam AND r.exam_date = :exam_date";
//            $stmt = $this->pdo->prepare($sql);
//            $stmt->bindParam(":idstudent", $this->idstudent, PDO::PARAM_INT);
//            $stmt->bindParam(":idexam", $this->idexam, PDO::PARAM_INT);
//            $stmt->bindParam(":exam_date", $this->exam_date, PDO::PARAM_INT);
//            $stmt->execute();
//        } catch(\PDOException  $e) {
//            echo $e->getMessage();
//        }
//
//    }
//


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
                $grade = 4;
            }
            if(!isset($result[$p["idproces"]]["proces_score"])) {
                $result[$p["idproces"]]["proces_score"] = 0;
            }
            $result[$p["idproces"]]["proces_score"] += $p["score"];
            $exam_score += $p["score"];
        }


        $examresult =  [
            'exam_result' => $exam_result,
            'result' => $result,
            'exam_score' => $exam_score,
            'grade' => $grade
        ];

        return $examresult;
    }
//    public function resultsByExam_old() {
//        $sql = "select
//                r.exam_date,
//                p.idproces,
//                p.description as proces_description,
//                ass.idassignment,
//                ass.description as assignment_description,
//                a.idaspect,
//                a.description as aspect_description,
//                a.score
//                from result as r
//                join aspect as a on r.idaspect = a.idaspect
//                join assignment as ass on a.idassignment = ass.idassignment
//                join proces as p on ass.idproces = p.idproces
//                join exam as e on p.idexam = e.idexam
//                where e.idexam = :idexam and r.idstudent = :idstudent and e.active = 1 and exam_date = :exam_date";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->bindParam(':idstudent', $this->idstudent, PDO::PARAM_INT);
//        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
//        $stmt->bindParam(':exam_date', $this->exam_date, PDO::PARAM_STR);
//        $stmt->execute();
//        $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        $result = [];
//        $exam_score = 0;
//        $exam_date = '';
//        foreach($stmt->fetchAll() as $p) {
//            $result[$p["idproces"]]["description"] = $p["proces_description"];
//            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["description"] = $p["assignment_description"];
//            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["aspect_description"] = $p["aspect_description"];
//            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["aspect_score"] = $p["score"];
//            if(!isset($result[$p["idproces"]]["proces_score"])) {
//                $result[$p["idproces"]]["proces_score"] = 0;
//            }
//            $result[$p["idproces"]]["proces_score"] += $p["score"];
//            $exam_score += $p["score"];
//            $exam_date = $p["exam_date"];
//        }
//
//        $examresult =  [
//            'result' => $result,
//            'exam_score' => $exam_score,
//            'exam_date' => $exam_date
//        ];
//
//        return $examresult;
//    }

    public function resultsByExamStudents() {
        $sql = "select 
                er.idexam,
                e.examcode,
                s.idstudent as student_idstudent,
                s.idgroup,
                IF(ISNULL(prefix), CONCAT(first_name, ' ', last_name), CONCAT(first_name, ' ', prefix, ' ', last_name )) AS fullname,
                er.exam_date,
                e.description as exam_description,
                e.caesura as caesura,
                SUM(a.score) as total_score,
                SUM(CASE WHEN ass.min_score > a.score THEN 1 ELSE 0 END) as grade
                from exam_result as er
                join exam as e on er.idexam = e.idexam
                join student as s on er.idstudent = s.idstudent
                join result as r on er.idstudent = r.idstudent and er.exam_date = r.exam_date and er.idexam = r.idexam
                join aspect as a on a.idaspect = r.idaspect
                join assignment  as ass on a.idassignment = ass.idassignment
                where er.idexam = :idexam and e.active = 1 and er.exam_date = :exam_date
                group by student_idstudent order by idgroup, exam_description, caesura, s.last_name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
        $stmt->bindParam(':exam_date', $this->exam_date, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $attempts = $this->getOccurencesUntilDate();
        $caesura = explode(" ",$result[0]['caesura']);
        foreach($result as $key => $value) {
            if($value['grade'] > 0) {
                $result[$key]['grade'] = 4;
            } else {
                $result[$key]['grade'] = str_replace(",", ".", $caesura[$result[$key]['total_score']]);
            }
            $result[$key]['attempt'] = $attempts[$result[$key]['student_idstudent']];
            $result[$key]['assessors'] = $this->getAssessorsByExamByDate();
        }
        return $result;
    }

//    public function resultsByExamStudents_old() {
//        $sql = "select
//                e.idexam,
//                e.examcode,
//                s.idstudent as student_idstudent,
//                s.idgroup,
//                IF(ISNULL(prefix), CONCAT(first_name, ' ', last_name), CONCAT(first_name, ' ', prefix, ' ', last_name )) AS fullname,
//                exam_date,
//                e.description as exam_description,
//                e.caesura as caesura,
//                SUM(a.score) as total_score
//                from result as r
//                join aspect as a on r.idaspect = a.idaspect
//                join assignment as ass on a.idassignment = ass.idassignment
//                join proces as p on ass.idproces = p.idproces
//                join exam as e on p.idexam = e.idexam
//                join student as s on r.idstudent = s.idstudent
//                where e.idexam = :idexam and e.active = 1 and exam_date = :exam_date
//                group by student_idstudent order by idgroup, exam_description, caesura, s.last_name";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
//        $stmt->bindParam(':exam_date', $this->exam_date, PDO::PARAM_STR);
//        $stmt->execute();
//        $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        $result = $stmt->fetchAll();
//        $attempts = $this->getOccurencesUntilDate();
//        $caesura = explode(" ",$result[0]['caesura']);
//        foreach($result as $key => $value) {
//            $result[$key]['grade'] = str_replace(",", ".", $caesura[$result[$key]['total_score']]);
//            $result[$key]['attempt'] = $attempts[$result[$key]['student_idstudent']];
//        }
//        //var_dump($result);
//        return $result;
//    }

//    public function resultsByExamAll() {
//        $sql = "select
//                e.idexam,
//                se.examcode,
//                s.idstudent as student_idstudent,
//                s.idgroup,
//                IF(ISNULL(prefix), CONCAT(first_name, ' ', last_name), CONCAT(first_name, ' ', prefix, ' ', last_name )) AS fullname,
//                exam_date,
//                ANY_VALUE(s.idgroup) as student_idgroup,
//                ANY_VALUE(e.description) as exam_description,
//                ANY_VALUE(e.caesura) as caesura,
//                SUM(a.score) as total_score
//                from result as r
//                join aspect as a on r.idaspect = a.idaspect
//                join assignment as ass on a.idassignment = ass.idassignment
//                join proces as p on ass.idproces = p.idproces
//                join exam as e on p.idexam = e.idexam
//                join student as s on r.idstudent = s.idstudent
//                where e.idexam = :idexam and e.active = 1
//                group by student_idstudent order by idgroup, s.last_name";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
//        $stmt->execute();
//        $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        $result = $stmt->fetchAll();
//        $attempts = $this->getOccurencesUntilDate();
//        $caesura = explode(" ",$result[0]['caesura']);
//        foreach($result as $key => $value) {
//            $result[$key]['grade'] = $caesura[$result[$key]['total_score']];
//            $result[$key]['attempt'] = $attempts[$result[$key]['student_idstudent']];
//        }
//        //var_dump($result);
//        return $result;
//    }


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
                group by e.idexam, exam_description, caesura, r.exam_date";
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
            } else {
                $exams[$r['idexam']]['attempt'][$r['exam_date']]['grade'] = 4;
            }
        }
        return $exams;
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

//    public function getStudentExams_old($idstudent) {
//        $sql = "select distinct
//                e.idexam,
//                r.exam_date
//                from result as r
//                join aspect as a on r.idaspect = a.idaspect
//                join student as s on r.idstudent = s.idstudent
//                join assignment as ass on a.idassignment = ass.idassignment
//                join proces as p on ass.idproces = p.idproces
//                join exam as e on p.idexam = e.idexam
//                where r.idstudent = :idstudent";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
//        $stmt->execute();
//        return $stmt->fetchAll();
//
//    }
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
//join result as r on er.idstudent = r.idstudent and er.exam_date = r.exam_date and er.idexam = r.idexam
//join aspect as a on r.idaspect = a.idaspect
//join student as s on r.idstudent = s.idstudent
//join assignment as ass on a.idassignment = ass.idassignment
//join proces as p on ass.idproces = p.idproces
//join exam as e on p.idexam = e.idexam

//    public function examResultsDetailByStudent($idstudent) {
//        $sql = "select
//                ANY_VALUE(e.description) as exam_description,
//                ANY_VALUE(a.idaspect) as idaspect,
//                ANY_VALUE(e.caesura) as caesura,
//                r.exam_date,
//                e.idexam,
//                SUM(a.score) as score
//                from result as r
//                join aspect as a on r.idaspect = a.idaspect
//                join student as s on r.idstudent = s.idstudent
//                join assignment as ass on a.idassignment = ass.idassignment
//                join proces as p on ass.idproces = p.idproces
//                join exam as e on p.idexam = e.idexam
//                where r.idstudent = :idstudent";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
//        $stmt->execute();
//        //$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Result::class, [$this->db]);
//        $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        foreach($stmt->fetchAll() as $r) {
//            $caesura = explode(" ", $r['caesura']);
//            $exams[$r['idexam']]['description'] = $r['exam_description'];
//            $exams[$r['idexam']]['attempt'][$r['exam_date']]['idaspect'] = $r['idaspect'];
//            $exams[$r['idexam']]['attempt'][$r['exam_date']]['score'] = $r['score'];
//            $exams[$r['idexam']]['attempt'][$r['exam_date']]['grade'] = $caesura[$r['score']];
//        }
//        return $exams;
//    }

}
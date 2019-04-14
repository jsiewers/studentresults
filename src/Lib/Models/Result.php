<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 11:42
 */

namespace Lib\Models;
use PDO;


class Result
{
    protected $pdo;
    protected $fields;
    public $exam_date, $idstudent, $idexam, $exam_description, $idproces, $p_description, $idassignment, $assignement_description, $idaspect, $aspect_description, $exam_score, $exam_grade;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function save() {
        try {
            $sql = "insert into result (idstudent, idaspect, exam_date) values (:idstudent, :idaspect, :exam_date);";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":idstudent", $this->idstudent, PDO::PARAM_INT);
            $stmt->bindParam(":idaspect", $this->idaspect, PDO::PARAM_INT);
            $stmt->bindParam(":exam_date", $this->exam_date, PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete() {
        try {
            $sql = "delete r from result as r
                join aspect as a on r.idaspect = a.idaspect
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                where e.active = 1 and idstudent = :idstudent AND e.idexam = :idexam AND r.exam_date = :exam_date";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":idstudent", $this->idstudent, PDO::PARAM_INT);
            $stmt->bindParam(":idexam", $this->idexam, PDO::PARAM_INT);
            $stmt->bindParam(":exam_date", $this->exam_date, PDO::PARAM_INT);
            $stmt->execute();
        } catch(\PDOException  $e) {
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
                a.idaspect,
                a.description as aspect_description,
                a.score
                from result as r
                join aspect as a on r.idaspect = a.idaspect
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                where e.idexam = :idexam and r.idstudent = :idstudent and e.active = 1 and exam_date = :exam_date";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $this->idstudent, PDO::PARAM_INT);
        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
        $stmt->bindParam(':exam_date', $this->exam_date, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = [];
        $exam_score = 0;
        $exam_date = '';
        foreach($stmt->fetchAll() as $p) {
            $result[$p["idproces"]]["description"] = $p["proces_description"];
            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["description"] = $p["assignment_description"];
            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["aspect_description"] = $p["aspect_description"];
            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["aspect_score"] = $p["score"];
            if(!isset($result[$p["idproces"]]["proces_score"])) {
                $result[$p["idproces"]]["proces_score"] = 0;
            }
            $result[$p["idproces"]]["proces_score"] += $p["score"];
            $exam_score += $p["score"];
            $exam_date = $p["exam_date"];
        }
        $examresult =  [
            'result' => $result,
            'exam_score' => $exam_score,
            'exam_date' => $exam_date
        ];

        return $examresult;
    }

    public function resultsByExamStudents() {
        $sql = "select 
                e.idexam,
                e.examcode,
                s.idstudent as student_idstudent,
                s.idgroup,
                IF(ISNULL(prefix), CONCAT(first_name, ' ', last_name), CONCAT(first_name, ' ', prefix, ' ', last_name )) AS fullname,
                exam_date,
                ANY_VALUE(s.idgroup) as student_idgroup,
                ANY_VALUE(e.description) as exam_description,
                ANY_VALUE(e.caesura) as caesura,
                SUM(a.score) as total_score
                from result as r
                join aspect as a on r.idaspect = a.idaspect
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                join student as s on r.idstudent = s.idstudent
                where e.idexam = :idexam and e.active = 1 and exam_date = :exam_date
                group by student_idstudent order by idgroup, s.last_name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
        $stmt->bindParam(':exam_date', $this->exam_date, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $attempts = $this->getOccurencesUntilDate();
        $caesura = explode(" ",$result[0]['caesura']);
        foreach($result as $key => $value) {
            $result[$key]['grade'] = str_replace(",", ".", $caesura[$result[$key]['total_score']]);
            $result[$key]['attempt'] = $attempts[$result[$key]['student_idstudent']];
        }
        //var_dump($result);
        return $result;
    }

    public function resultsByExamAll() {
        $sql = "select 
                e.idexam,
                se.examcode,
                s.idstudent as student_idstudent,
                s.idgroup,
                IF(ISNULL(prefix), CONCAT(first_name, ' ', last_name), CONCAT(first_name, ' ', prefix, ' ', last_name )) AS fullname,
                exam_date,
                ANY_VALUE(s.idgroup) as student_idgroup,
                ANY_VALUE(e.description) as exam_description,
                ANY_VALUE(e.caesura) as caesura,
                SUM(a.score) as total_score
                from result as r
                join aspect as a on r.idaspect = a.idaspect
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                join student as s on r.idstudent = s.idstudent
                where e.idexam = :idexam and e.active = 1
                group by student_idstudent order by idgroup, s.last_name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $attempts = $this->getOccurencesUntilDate();
        $caesura = explode(" ",$result[0]['caesura']);
        foreach($result as $key => $value) {
            $result[$key]['grade'] = $caesura[$result[$key]['total_score']];
            $result[$key]['attempt'] = $attempts[$result[$key]['student_idstudent']];
        }
        //var_dump($result);
        return $result;
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
                ANY_VALUE(e.description) as exam_description,
                ANY_VALUE(a.idaspect) as idaspect,
                ANY_VALUE(e.caesura) as caesura,
                r.exam_date, 
                e.idexam,
                SUM(a.score) as score 
                from result as r
                join aspect as a on r.idaspect = a.idaspect
                join student as s on r.idstudent = s.idstudent
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                where r.idstudent = :idstudent
                group by e.idexam, r.exam_date";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Result::class, [$this->db]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $r) {
            $caesura = explode(" ", $r['caesura']);
            $exams[$r['idexam']]['description'] = $r['exam_description'];
            $exams[$r['idexam']]['attempt'][$r['exam_date']]['idaspect'] = $r['idaspect'];
            $exams[$r['idexam']]['attempt'][$r['exam_date']]['score'] = $r['score'];
            $exams[$r['idexam']]['attempt'][$r['exam_date']]['grade'] = $caesura[$r['score']];
        }
        return $exams;
    }

    public function getStudentExams($idstudent) {
        $sql = "select distinct
                e.idexam,
                r.exam_date
                from result as r
                join aspect as a on r.idaspect = a.idaspect
                join student as s on r.idstudent = s.idstudent
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                where r.idstudent = :idstudent";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function examResultsDetailByStudent($idstudent) {
        $sql = "select 
                ANY_VALUE(e.description) as exam_description,
                ANY_VALUE(a.idaspect) as idaspect,
                ANY_VALUE(e.caesura) as caesura,
                r.exam_date, 
                e.idexam,
                SUM(a.score) as score 
                from result as r
                join aspect as a on r.idaspect = a.idaspect
                join student as s on r.idstudent = s.idstudent
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                where r.idstudent = :idstudent";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Result::class, [$this->db]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $r) {
            $caesura = explode(" ", $r['caesura']);
            $exams[$r['idexam']]['description'] = $r['exam_description'];
            $exams[$r['idexam']]['attempt'][$r['exam_date']]['idaspect'] = $r['idaspect'];
            $exams[$r['idexam']]['attempt'][$r['exam_date']]['score'] = $r['score'];
            $exams[$r['idexam']]['attempt'][$r['exam_date']]['grade'] = $caesura[$r['score']];
        }
        return $exams;
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `results`.`result` (
                  `exam_date` VARCHAR(45) NOT NULL,
                  `idstudent` INT NOT NULL,
                  `idaspect` INT NOT NULL,
                  PRIMARY KEY (`exam_date`, `idstudent`, `idaspect`),
                  INDEX `fk_assignment_result_student1_idx` (`idstudent` ASC) VISIBLE,
                  INDEX `fk_assignment_result_aspect1_idx` (`idaspect` ASC) VISIBLE,
                  CONSTRAINT `fk_assignment_result_student1`
                    FOREIGN KEY (`idstudent`)
                    REFERENCES `results`.`student` (`idstudent`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION,
                  CONSTRAINT `fk_assignment_result_aspect1`
                    FOREIGN KEY (`idaspect`)
                    REFERENCES `results`.`aspect` (`idaspect`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                ENGINE = InnoDB;";

        $stmt = $this->pdo->query($sql);

    }



}
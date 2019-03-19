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
    public $exam_date, $idstudent, $idexam, $exam_description, $idproces, $p_description, $idassignment, $assignement_description, $idaspect, $aspect_description, $exam_score;

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
                where e.idexam = :idexam and r.idstudent = :idstudent and exam_date = :exam_date";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $this->idstudent, PDO::PARAM_INT);
        $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
        $stmt->bindParam(':exam_date', $this->exam_date, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $exam_score = 0;
        $exam_date = '';
        foreach($stmt->fetchAll() as $p) {
            $result[$p["idproces"]]["description"] = $p["proces_description"];
            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["description"] = $p["assignment_description"];
            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["aspect_description"] = $p["aspect_description"];
            $result[$p["idproces"]]["assignments"][$p["idassignment"]]["aspect_score"] = $p["score"];
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

//    public function resultsByStudent($idstudent) {
//        $sql = "select r.idstudent,
//                r.exam_date,
//                e.idexam,
//                e.description as exam_description,
//                p.idproces,
//                p.description as proces_description,
//                ass.idassignment,
//                ass.description as assignment_description,
//                a.idaspect,
//                a.description as aspect_description
//                from result as r
//                join aspect as a on r.idaspect = a.idaspect
//                join student as s on r.idstudent = s.idstudent
//                join assignment as ass on a.idassignment = ass.idassignment
//                join proces as p on ass.idproces = p.idproces
//                join exam as e on p.idexam = e.idexam
//                where r.idstudent = :idstudent;";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
//        $stmt->execute();
//        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Result::class, [$this->db]);
//        return $stmt->fetchAll();
//    }

    public function examResultsByStudent($idstudent) {
        $sql = "select 
                ANY_VALUE(e.description) as exam_description,
                ANY_VALUE(a.idaspect) as idaspect,
                r.exam_date, 
                e.idexam,
                SUM(a.score) as score 
                from result as r
                join aspect as a on r.idaspect = a.idaspect
                join student as s on r.idstudent = s.idstudent
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                where r.idstudent = '584999'
                group by e.idexam, r.exam_date";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Result::class, [$this->db]);
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
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
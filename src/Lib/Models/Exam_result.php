<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 11:42
 */

namespace Lib\Models;
use PDO;


class Exam_result
{
    protected $pdo;
    public $comment, $assessor1, $assessor1_name, $assessor2, $assessor2_name, $score, $grade;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function save() {
        try {
            $sql = "insert into exam_result (idstudent, idexam, exam_date, comment, assessor1, assessor2) 
                    values (:idstudent, :idexam, :exam_date, :comment, :assessor1, :assessor2);";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":idstudent", $this->idstudent, PDO::PARAM_INT);
            $stmt->bindParam(":idexam", $this->idexam, PDO::PARAM_INT);
            $stmt->bindParam(":exam_date", $this->exam_date, PDO::PARAM_STR);
            $stmt->bindParam(":comment", $this->comment, PDO::PARAM_STR);
            $stmt->bindParam(":assessor1", $this->assessor1, PDO::PARAM_INT);
            $stmt->bindParam(":assessor2", $this->assessor2, PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            echo "Exam_result-error: ".$e->getMessage();
        }
    }


    public function read() {
        try {
            $sql = "select u.iduser, assessor1, assessor2, comment, CONCAT(u.first_name, ' ', u.last_name) as assessor1_name, CONCAT(u2.first_name, ' ', u2.last_name) as assessor2_name 
                    from exam_result as er
                    join user as u on u.iduser = er.assessor1
                    join user as u2 on u2.iduser = er.assessor2
                    where idstudent = :idstudent AND idexam = :idexam AND exam_date = :exam_date";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":idstudent", $this->idstudent, PDO::PARAM_INT);
            $stmt->bindParam(":idexam", $this->idexam, PDO::PARAM_INT);
            $stmt->bindParam(":exam_date", $this->exam_date, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Exam_result::class, [$this->pdo]);
            return $stmt->fetch();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete() {
        try {
            $sql = "delete from exam_result
                    where idstudent = :idstudent AND idexam = :idexam AND exam_date = :exam_date";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":idstudent", $this->idstudent, PDO::PARAM_INT);
            $stmt->bindParam(":idexam", $this->idexam, PDO::PARAM_INT);
            $stmt->bindParam(":exam_date", $this->exam_date, PDO::PARAM_STR);
            $stmt->execute();
        } catch(\PDOException  $e) {
            echo $e->getMessage();
        }

    }



}
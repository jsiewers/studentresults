<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 11:42
 */

namespace Lib\Models;
use PDO;


class Result_comment
{
    protected $pdo;
    public $comment;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function save() {
        try {
            $sql = "insert into result_comment (idstudent, idexam, exam_date, comment) values (:idstudent, :idexam, :exam_date, :comment);";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":idstudent", $this->idstudent, PDO::PARAM_INT);
            $stmt->bindParam(":idexam", $this->idexam, PDO::PARAM_INT);
            $stmt->bindParam(":exam_date", $this->exam_date, PDO::PARAM_INT);
            $stmt->bindParam(":comment", $this->comment, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function read() {
        try {
            $sql = "select * from result_comment where idstudent = :idstudent AND idexam = :idexam AND exam_date = :exam_date";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":idstudent", $this->idstudent, PDO::PARAM_INT);
            $stmt->bindParam(":idexam", $this->idexam, PDO::PARAM_INT);
            $stmt->bindParam(":exam_date", $this->exam_date, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Result_comment::class, [$this->pdo]);
            return $stmt->fetch();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete() {
        try {
            $sql = "delete rc from result_comment as rc
                where idstudent = :idstudent AND idexam = :idexam AND exam_date = :exam_date";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":idstudent", $this->idstudent, PDO::PARAM_INT);
            $stmt->bindParam(":idexam", $this->idexam, PDO::PARAM_INT);
            $stmt->bindParam(":exam_date", $this->exam_date, PDO::PARAM_INT);
            $stmt->execute();
        } catch(\PDOException  $e) {
            echo $e->getMessage();
        }

    }


}
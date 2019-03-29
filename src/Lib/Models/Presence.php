<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-27
 * Time: 14:13
 */

namespace Lib\Models;
use PDO;


class Presence
{
    protected $pdo;
    public $title, $startdatetime, $enddatetime, $idexam, $idstudent;

    public function __construct($db)
    {
        $this->pdo = $db;
    }


    public function read() {
        $sql = "SELECT * FROM presence AS p JOIN student AS s ON s.idstudent = p.idstudent ORDER BY s.idstudent";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function readTitles() {
        $sql = "select distinct title from presence";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function save() {
        $sql = "INSERT INTO presence (title, idexam, idstudent, startdatetime, enddatetime) VALUES (:title, :idexam, :idstudent, :startdatetime, :enddatetime)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $this->title,PDO::PARAM_STR);
        $stmt->bindParam(':idexam', $this->idexam,PDO::PARAM_INT);
        $stmt->bindParam(':idstudent', $this->idstudent,PDO::PARAM_INT);
        $stmt->bindParam(':startdatetime', $this->startdatetime,PDO::PARAM_STR);
        $stmt->bindParam(':enddatetime', $this->enddatetime,PDO::PARAM_STR);
        $stmt->execute();
    }

    public function readByTitle() {
        $sql = "SELECT * FROM presence AS p JOIN student AS s ON s.idstudent = p.idstudent WHERE title = :title ORDER BY s.idstudent";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $this->title,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $s) {
            $student = new Student($this->db);
            $student->idstudent = $s['idstudent'];
            $student->first_name = $s['first_name'];
            $student->prefix = $s['prefix'];
            $student->last_name = $s['last_name'];
            $students[] = ['student' => $student, 'presence' => $s ];
        }
        return $students;
    }
}
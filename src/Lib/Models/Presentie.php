<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-27
 * Time: 14:13
 */

namespace Lib\Models;
use PDO;


class Presentie
{
    protected $pdo;

    public function __construct($db)
    {
        $this->pdo = $db;
    }


    public function read() {
        $sql = "SELECT * FROM presentie AS p JOIN student AS s ON s.idstudent = p.idstudent ORDER BY s.idstudent";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function save() {
        $sql = "INSERT INTO presentie (idexam, idstudent, startdatetime, enddatetime) (:idexam, :idstudent, :startdatetime, :enddatetime)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idexam', $this->idexam,PDO_PARAM::INT);
        $stmt->bindParam(':idstudent', $this->idstudent,PDO_PARAM::INT);
        $stmt->bindParam(':startdatetime', $this->startdatetime,PDO_PARAM::STR);
        $stmt->bindParam(':enddatetime', $this->enddatetime,PDO_PARAM::STR);
        $stmt->execute();
    }
}
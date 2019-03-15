<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 15:49
 */

namespace Lib\Models;
use PDO;

class ExamResult
{
    public $exam_date, $idstudent, $idexam, $exam_description, $idproces, $proces_description, $idassignment, $assignement_description, $idaspect, $aspect_description, $score;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

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
                where r.idstudent = :idstudent
                group by e.idexam, r.exam_date";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Result::class, [$this->db]);
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function attempt($idexam, $examdate) {

    }
}
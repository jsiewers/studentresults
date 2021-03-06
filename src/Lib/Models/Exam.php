<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 14:21
 */

namespace Lib\Models;

use PDO;


class Exam
{
    protected $pdo;
    protected $fields;
    public $idexam, $description, $active, $caesura;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function readAll() {
        $sql = "select * from exam where active = 1 order by description";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();

    }
    public function readByStudentIdResult($idstudent)
    {
        $sql = "select distinct e.idexam, soort, examcode, exam_date from exam_result er 
                join student s on s.idstudent = er.idstudent 
                join exam e on e.idexam = er.idexam
                where s.idstudent = :idstudent
                order by soort, examcode, exam_date;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function read()
    {
        $sql = "select 
                e.idexam as examid,
                e.examcode as examcode,
                e.description,
                r.exam_date
                from result as r
                join aspect as a on r.idaspect = a.idaspect
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = p.idproces
                join exam as e on p.idexam = e.idexam
                where e.active = 1
                group by examid, exam_date, e.description, examcode
                order by r.exam_date;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
       //$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Exam::class, [$this->db]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $e) {
            $exam[$e['examid']]['examid'] = $e['examid'];
            $exam[$e['examid']]['examcode'] = $e['examcode'];
            $exam[$e['examid']]['description'] = $e['description'];
            $exam[$e['examid']]['dates'][] = $e['exam_date'];
        }

         //var_dump($exam);
        return($exam);
    }



    public function readById($idexam)
    {
        $sql = "SELECT * FROM exam WHERE idexam = :idexam";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idexam', $idexam, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Exam::class, [$this->pdo]);
        return $stmt->fetch();
    }

    public function save()
    {
        try {
            $sql = "INSERT INTO exam (idexam, description, active, caesura, examcode) VALUES (:idexam, :description, 1, :caesura, :examcode)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
            $stmt->bindParam(':caesura', $this->caesura, PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':examcode', $this->examcode, PDO::PARAM_STR);
            $result = $stmt->execute();
        } catch (\PDOException $e) {
            $result = $e->getMessage();
        }

        return $result;
    }

    public function form()
    {
        $formdata = [
            ['idexam' => ['type' => 'text', 'label' => 'Exam ID', 'value' => '']],
            ['description' => ['type' => 'text', 'label' => 'Omschrijving', 'value' => '']],
        ];
    }


    public function readExamWithDeps($idexam)
    {
        $sql = "select 
                e.idexam,
                e.description as exam_description, 
                e.examcode as examcode, 
                p.idproces, 
                p.description as proces_description, 
                ass.idassignment, 
                ass.description as assignment_description,
                a.idaspect,
                a.description as aspect_description,
                a.score
                from exam as e
                join proces as p on e.idexam =  p.idexam
                join assignment as ass on p.idproces = ass.idproces
                join aspect as a on ass.idassignment = a.idassignment
                where e.idexam = :idexam and e.active = 1 order by idproces, ass.idassignment, score ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idexam', $idexam, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultset = $stmt->fetchAll();
        $exam = [];
        foreach ($resultset as $p) {
            $exam['description'] = $p['exam_description'];
            $exam['idexam'] = $p['idexam'];
            $exam['examcode'] = $p['examcode'];
            $exam['processes'][$p['idproces']]['description'] = $p['proces_description'];
            $exam['processes'][$p['idproces']]['idproces'] = $p['idproces'];
            $exam['processes'][$p['idproces']]['assignments'] [$p['idassignment']]['description'] = $p['assignment_description'];
            $exam['processes'][$p['idproces']]['assignments'] [$p['idassignment']]['idassignment'] = $p['idassignment'];
            $exam['processes'][$p['idproces']]['assignments'] [$p['idassignment']]['aspects'][$p['idaspect']]['description'] = $p['aspect_description'];
            $exam['processes'][$p['idproces']]['assignments'] [$p['idassignment']]['aspects'][$p['idaspect']]['idaspect'] = $p['idaspect'];

        }
        //var_dump($exam);
        return $exam;
    }


    public function createTable()
    {

        $sql = "CREATE TABLE IF NOT EXISTS `results`.`exam` (
          `idexam` INT NOT NULL,
          `description` VARCHAR(254) NULL,
          `active` INT NOT NULL DEFAULT 1,
          PRIMARY KEY (`idexam`))
        ENGINE = InnoDB;";

        $stmt = $this->pdo->query($sql);

    }

    public function dropTable()
    {
        $sql = "DROP TABLE IF EXISTS `results`.`student` ;";
        $stmt = $this->pdo->query($sql);
    }

    public function seedTable()
    {
        $sql = [
            "REPLACE INTO `results`.`exam` (`idexam`, `description`, `active`) VALUES (505, 'Veilig programmeren', 1);",
            "REPLACE INTO `results`.`exam` (`idexam`, `description`, `active`) VALUES (023, 'Digitale Vaardigheden', 1);",
            "REPLACE INTO `results`.`exam` (`idexam`, `description`, `active`) VALUES (251871, 'B1-K1', 1);",
            "REPLACE INTO `results`.`exam` (`idexam`, `description`, `active`) VALUES (251872, 'B1-K2', 1);"
        ];

        foreach ($sql as $q) {
            $stmt = $this->pdo->query($q);
        }
    }
}
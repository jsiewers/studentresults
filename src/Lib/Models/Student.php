<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 08:15
 */

namespace Lib\Models;
use PDO;



class Student
{
    protected $pdo;
    public $idstudent, $first_name, $last_name, $prefix, $email, $idgroup, $stime;

    public function __construct($db)
    {
         $this->pdo = $db;
    }

   public function fullName() {
        $p = (empty($this->prefix)) ? "" : " ".$this->prefix;
        return $this->first_name. $p . " " . $this->last_name;
    }

    public function getCohort() {
         //$start_cohort =  "201".substr($this->idgroup,-1,1);
         //$end_cohort = (int)$start_cohort + 1;
         //return $start_cohort. " / ".$end_cohort;
        return "hallo";

    }

    public function read() {
        $sql = "SELECT * FROM student ORDER BY idgroup, last_name LIMIT 50";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Student::class, [$this->pdo]);
        return $stmt->fetchAll();
    }

    public function readByGroup() {
        $sql = "SELECT * FROM student WHERE idgroup = :idgroup ORDER BY last_name LIMIT 50";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idgroup', $this->idgroup, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Student::class, [$this->pdo]);
        return $stmt->fetchAll();
    }

    public function getGroups() {
        $sql = "SELECT DISTINCT idgroup FROM student";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

//    public function readById($idstudent) {
//        $sql = "SELECT * FROM student WHERE idstudent = :idstudent";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
//        $stmt->execute();
//        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Student::class, [$this->pdo]);
//        return $stmt->fetch();
//    }

    public function readById($idstudent) {
        $sql = "SELECT * FROM student, basegroup WHERE idstudent = :idstudent and student.idgroup = basegroup.idgroup";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Student::class, [$this->pdo]);
        return $stmt->fetch();
    }

    public function setup() {
        //$this->dropTable();
        $this->createTable();
        $this->seedTable();
    }

    public function createTable()
    {

        $sql = "CREATE TABLE IF NOT EXISTS `results` . `student` (
        `idstudent` INT NOT NULL,
        `first_name` VARCHAR(45) NOT NULL,
        `last_name` VARCHAR(45) NOT NULL,
        `prefix` VARCHAR(45) NULL,
        PRIMARY KEY(`idstudent`))
        ENGINE = InnoDB;";

        $stmt = $this->pdo->query($sql);

    }

    public function save() {
        $sql = "REPLACE INTO student (idstudent, first_name, last_name, prefix, email, idgroup) VALUES (:idstudent, :first_name, :last_name, :prefix, :email, :idgroup);";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':idstudent', $this->idstudent, PDO::PARAM_INT);
            $stmt->bindParam(':first_name', $this->first_name, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $this->last_name, PDO::PARAM_STR);
            $stmt->bindParam(':prefix', $this->prefix, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':idgroup', $this->idgroup, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function dropTable() {
        $sql = "DROP TABLE IF EXISTS `results`.`student` ;";
        $stmt = $this->pdo->query($sql);
   }

    public function seedTable() {
        $sql = [
            "REPLACE INTO `results`.`student` (`idstudent`, `first_name`, `last_name`, `prefix`) VALUES (584999, 'Jan Jaap', 'Siewers', NULL);",
            "REPLACE INTO `results`.`student` (`idstudent`, `first_name`, `last_name`, `prefix`) VALUES (788765, 'Piet', 'Vries', 'de');",
            "REPLACE INTO `results`.`student` (`idstudent`, `first_name`, `last_name`, `prefix`) VALUES (654332, 'Klaas', 'Bruggeman', NULL);",
            "REPLACE INTO `results`.`student` (`idstudent`, `first_name`, `last_name`, `prefix`) VALUES (203349, 'Wesley', 'Sneijder', NULL);",
            ];

        foreach($sql as $q) {
            $stmt = $this->pdo->query($q);
        }
    }

}
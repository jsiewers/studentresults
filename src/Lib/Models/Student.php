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
    protected $fields;
    public $idstudent, $first_name, $last_name, $prefix;

    public function __construct($db)
    {
        $this->fields = [
            ['label'=> 'OV-nummer', 'field' => 'idstudent'],
            ['label'=> 'Voornaam', 'field' => 'first_name'],
            ['label'=> 'Achternaam', 'field' => 'last_name'],
            ['label'=> 'Tussenvoegsel', 'field' => 'prefix'],
         ];
        $this->pdo = $db;
    }

   public function fullName() {
        $p = (empty($this->prefix)) ? "" : " ".$this->prefix;
        return $this->first_name. $p . " " . $this->last_name;
    }

    public function read() {
        $sql = "SELECT * FROM student";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Student::class, [$this->db]);
        return $stmt->fetchAll();
    }

    public function readById($idstudent) {
        $sql = "SELECT * FROM student WHERE idstudent = :idstudent";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idstudent', $idstudent, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Student::class, [$this->db]);
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
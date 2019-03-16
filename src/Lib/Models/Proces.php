<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-16
 * Time: 11:48
 */

namespace Lib\Models;
use PDO;

class Proces
{
    protected $pdo;
    protected $fields;
    public $idproces, $idexam, $description;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function read() {
        $sql = "SELECT * FROM proces";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Proces::class, [$this->db]);
        return $stmt->fetchAll();
    }

    public function readById($idproces) {
        $sql = "SELECT * FROM proces WHERE idproces = :idproces";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idproces', $idproces, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Proces::class, [$this->db]);
        return $stmt->fetch();
    }
    public function readByExam($idexam) {
        $sql = "SELECT * FROM proces WHERE idexam = :idexam";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idexam', $idexam, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Proces::class, [$this->db]);
        return $stmt->fetchAll();
    }

    public function save() {
        try {
            $sql = "INSERT INTO proces (idexam, description, active) VALUES (:idexam, :description, 1)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':idexam', $this->idexam, PDO::PARAM_INT);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\PDOException $e) {
            $result = $e->getMessage();
        }
        return $result;
    }

     public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `results`.`proces` (
              `idproces` INT NOT NULL AUTO_INCREMENT,
              `idexam` INT NOT NULL,
              `description` VARCHAR(254) NULL,
              `active` INT NOT NULL DEFAULT 1,
              PRIMARY KEY (`idproces`),
              INDEX `fk_assignment_exam_idx` (`idexam` ASC),
              CONSTRAINT `fk_assignment_exam`
                FOREIGN KEY (`idexam`)
                REFERENCES `results`.`exam` (`idexam`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB;";

        $stmt = $this->pdo->query($sql);

    }

}
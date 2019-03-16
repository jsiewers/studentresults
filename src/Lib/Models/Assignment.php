<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-16
 * Time: 11:48
 */

namespace Lib\Models;
use PDO;

class Assignment
{
    protected $pdo;
    protected $fields;
    public $idexam, $description;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function read() {
        $sql = "SELECT * FROM assignment";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Assignment::class, [$this->db]);
        return $stmt->fetchAll();
    }

    public function readByProces($idproces) {
        $sql = "SELECT * FROM assignment WHERE idproces = :idproces";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idproces', $idproces, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Assignment::class, [$this->db]);
        return $stmt->fetchAll();
    }

    public function readById($idassignment) {
        $sql = "SELECT * FROM assignment WHERE idassignment = :idassignment";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idassignment', $idassignment, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Assignment::class, [$this->db]);
        return $stmt->fetch();
    }

    public function save() {
        try {
            $sql = "INSERT INTO assignment (idproces, description, active) VALUES (:idproces, :description, 1)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':idproces', $this->idproces, PDO::PARAM_INT);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\PDOException $e) {
            $result = $e->getMessage();
        }
        return $result;
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `results`.`assignment` (
                  `idassignment` INT NOT NULL AUTO_INCREMENT,
                  `idproces` INT NOT NULL,
                  `description` VARCHAR(45) NULL,
                  `active` INT NOT NULL,
                 PRIMARY KEY (`idassignment`),
                  INDEX `fk_assignment_proces1_idx` (`idproces` ASC),
                  CONSTRAINT `fk_assignment_proces1`
                    FOREIGN KEY (`idproces`)
                    REFERENCES `results`.`proces` (`idproces`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                ENGINE = InnoDB;";

        $stmt = $this->pdo->query($sql);

    }

}
<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 12:53
 */

namespace Lib\Models;
use PDO;


class Aspect
{
    protected $pdo;
    protected $fields;
    public $idaspect, $idassignment, $description;


    public function __construct($db)
    {
         $this->pdo = $db;
    }

    public function read()
    {
        $sql = "use results;
                select idaspect, a.idassignment, a.description from aspect as a
                join aspect as a on r.idaspect = a.idaspect
                join assignment as ass on a.idassignment = ass.idassignment
                join proces as p on ass.idproces = ass.idproces
                join exam as e on p.idexam = e.idexam;";
    }

    public function readByAssignment($idassignment) {
        $sql = "SELECT * FROM aspect WHERE idassignment = :idassignment ORDER BY score";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idassignment', $idassignment, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Aspect::class, [$this->db]);
        return $stmt->fetchAll();
    }

    public function save() {
        try {
            $sql = "INSERT INTO aspect (idassignment, description, score, criterium, active) VALUES (:idassignment, :description, :score, 0, 1)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':idassignment', $this->idassignment, PDO::PARAM_INT);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':score', $this->score, PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            $result = $e->getMessage();
        }
        return $result;
    }

    public function update() {
        try {
            $sql = "update aspect set 
                      idassignment = :idassignment, 
                      description = :description, 
                      score = :score WHERE idaspect = :idaspect;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':idaspect', $this->idaspect, PDO::PARAM_INT);
            $stmt->bindParam(':idassignment', $this->idassignment, PDO::PARAM_INT);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':score', $this->score, PDO::PARAM_INT);
            $result = $stmt->execute();
        } catch (\PDOException $e) {
            $result =  $e->getMessage();
        }
        return $result;
    }


    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `results`.`aspect` (
              `idaspect` INT NOT NULL AUTO_INCREMENT,
              `idassignment` INT NOT NULL,
              `description` VARCHAR(45) NULL,
              `score` INT NULL,
              `criterium` INT NULL,
              `active` INT NULL,
              PRIMARY KEY (`idaspect`),
              INDEX `fk_aspect_assignment1_idx` (`idassignment` ASC),
              CONSTRAINT `fk_aspect_assignment1`
                FOREIGN KEY (`idassignment`)
                REFERENCES `results`.`assignment` (`idassignment`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB;";
        $this->pdo->query($sql);
    }
}



<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 12:53
 */

namespace Lib\Models;


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


    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `results`.`aspect` (
                `idaspect` INT NOT NULL,
                  `idassignment` INT NOT NULL,
                  `score` INT NOT NULL,
                  `description` VARCHAR(254) NOT NULL,
                  `criterium` INT NOT NULL,
                  PRIMARY KEY (`idaspect`),
                  INDEX `fk_aspect_assignment1_idx` (`idassignment` ASC) VISIBLE,
                  CONSTRAINT `fk_aspect_assignment1`
                    FOREIGN KEY (`idassignment`)
                    REFERENCES `results`.`assignment` (`idassignment`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                ENGINE = InnoDB;";
        $this->pdo->query($sql);
    }
}



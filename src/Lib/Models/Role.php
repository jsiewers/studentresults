<?php

namespace Lib\Models;
use PDO;

class Role
{
    public $description, $idrole;

    protected $pdo;


    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function read() {
        $sql = "SELECT * FROM role ORDER BY description";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Role::class, [$this->pdo]);
        return $stmt->fetchAll();
    }

    public function save() {
        $sql = "INSERT INTO role (description) VALUES (:description);";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':description', $this->idstudent, PDO::PARAM_STR);
             $stmt->execute();
        } catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

}




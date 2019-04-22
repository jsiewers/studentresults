<?php

namespace Lib\Models;
use PDO;


/**
 * User
 *
 * @author    Haven Shen <havenshen@gmail.com>
 * @copyright    Copyright (c) Haven Shen
 */
class User
{

	public $first_name;

	public $last_name;

	public $email;

	public $password;

	protected $pdo;


	public function __construct($db)
    {
        $this->pdo = $db;
    }



	public function setPassword($password)
	{
		$this->update([
			'password' => password_hash($password, PASSWORD_DEFAULT)
		]);
	}

	public function save() {
        try {
            $sql = "INSERT INTO user (email, password, first_name, last_name) 
                    VALUES (:email, :password, :first_name, :last_name)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $this->first_name, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $this->last_name, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\PDOException $e) {
            var_dump($result = $e->getMessage());
        }
        return $result;
    }

	public function getFullName()
	{
		return "$this->first_name $this->last_name";
	}

	public function getEmailVariables()
	{
		return [
			'full_name' => $this->getFullName(),
			'email' => $this->getEmail(),
		];
	}

	public function readByRole($role) {
        try {
        $sql = "SELECT u.iduser, first_name, last_name, email, r.description 
                FROM user as u 
                JOIN user_has_role as ur ON ur.iduser = u.iduser
                JOIN role as r ON r.idrole = ur.idrole 
                WHERE r.idrole = :role 
                ORDER BY last_name" ;
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':role', $role, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Role::class, [$this->pdo]);
        return $stmt->fetchAll();
        } catch (\PDOException $e) {
            var_dump($result = $e->getMessage());
        }

    }
}
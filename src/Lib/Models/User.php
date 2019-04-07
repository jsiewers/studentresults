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
}
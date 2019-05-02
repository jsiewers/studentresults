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

	public $iduser, $first_name, $last_name, $email, $roles;
	private $password;
	protected $pdo;

	public function __construct($db)
    {
        $this->pdo = $db;
    }

	public function setPassword($password)
	{
		//$this->update([
		//	'password' => password_hash($password, PASSWORD_DEFAULT)
		//]);

        $this->password = password_hash($password, PASSWORD_DEFAULT);
	}

	public function getPassword() {
	    return $this->password;
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
            $this->iduser = $this->pdo->lastInsertId();
            foreach($this->roles as $role) {
                $sql = "INSERT INTO user_has_role (iduser, idrole) VALUES (:iduser, :idrole)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':iduser', $this->iduser, PDO::PARAM_INT);
                $stmt->bindParam(':idrole', $role, PDO::PARAM_INT);
                $stmt->execute();
            }
        } catch (\PDOException $e) {
            var_dump($result = $e->getMessage());
        }
        return $result;
    }

	public function getFullName()
	{
		return $this->first_name ." ". $this->last_name;
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
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, User::class, [$this->pdo]);
        return $stmt->fetchAll();
        } catch (\PDOException $e) {
            var_dump($result = $e->getMessage());
        }

    }
    public function read() {
	    $users = [];
        try {
            $sql = "SELECT u.iduser, first_name, last_name, email, r.description 
                FROM user as u 
                JOIN user_has_role as ur ON ur.iduser = u.iduser
                JOIN role as r ON r.idrole = ur.idrole 
                ORDER BY last_name" ;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        } catch (\PDOException $e) {
            var_dump($result = $e->getMessage());
        }
        foreach($result as $row) {
            $users[$row['iduser']]['fullname'] = $row['first_name']. " " . $row['last_name'];
            $users[$row['iduser']]['email'] = $row['email'];
            $users[$row['iduser']]['roles'][] = $row['description'];
        }
        return $users;
    }
    public function readByIds($ids) {
        $users = [];
        try {
            $sql = "SELECT u.iduser, first_name, last_name, email, r.description 
                FROM user as u 
                JOIN user_has_role as ur ON ur.iduser = u.iduser
                JOIN role as r ON r.idrole = ur.idrole 
                ORDER BY last_name" ;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($ids);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        } catch (\PDOException $e) {
            var_dump($result = $e->getMessage());
        }
        foreach($result as $row) {
            $users[$row['iduser']]['fullname'] = $row['first_name']. " " . $row['last_name'];
            $users[$row['iduser']]['email'] = $row['email'];
            $users[$row['iduser']]['roles'][] = $row['description'];
        }
        return $users;
    }

    public function readByEmailAndPassword($email, $password) {
        try {
            $sql = "SELECT iduser, first_name, last_name, email, password 
                    FROM user WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, User::class, [$this->pdo]);
            $user = $stmt->fetch();
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }

        if(password_verify($password, $user->getPassword())) {
            $user->roles = $this->setRoles($user->iduser);
            return $user;
        } else {
            return false;
        }
    }

    public function setRoles($iduser) {
	    $roles = [];
	    $result = [];
        try {
            $sql = "SELECT idrole FROM user_has_role 
                    WHERE iduser = :iduser";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':iduser', $iduser, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result =  $stmt->fetchAll();
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
        foreach($result as $row) {
            $roles[] = $row['idrole'];
        }
        return $roles;
    }
}
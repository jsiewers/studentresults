<?php

namespace Lib\Auth;

use Lib\Models\User;
use PDO;

/**
 * Auth
 *
 */
class Auth
{
    protected $pdo;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

	public function user()
	{
	    $sql = "select * from user where iduser = :iduser";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':iduser', $_SESSION['user']['iduser'], PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Exam::class, [$this->pdo]);
        $stmt->execute();
        return $stmt->fetch();
	}

	public function check()
	{
		return isset($_SESSION['user']['iduser']);
	}

	public function checkAdmin() {
        if(isset($_SESSION['user']['iduser']) AND in_array(1,$_SESSION['user']['roles'])) {
            return true;
        } else {
            return false;
        }
    }

    public function checkAssessor() {
        if(isset($_SESSION['user']['iduser']) AND in_array(2,$_SESSION['user']['roles'])) {
            return true;
        } else {
            return false;
        }
    }

    public function attempt($email, $password) {
        $user = new User($this->pdo);
        $authenticated_user = $user->readByEmailAndPassword($email, $password);
        //var_dump($authenticated_user);
        //$authenticated_user->pdo = null;
        if(!$authenticated_user) {
            return false;
        } else {
            $_SESSION['user']['iduser'] = $authenticated_user->iduser;
            $_SESSION['user']['fullname'] = $authenticated_user->getFullName();
            $_SESSION['user']['roles'] = $authenticated_user->roles;
            return true;
        }
    }

	public function logout()
	{
        unset($_SESSION['user']);
        session_destroy();
	}
}
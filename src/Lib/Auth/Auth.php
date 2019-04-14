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
	    //var_dump("in function user(); van ". get_class($this));
	    $sql = "select * from user where iduser = :iduser";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':iduser', $_SESSION['user'], PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Exam::class, [$this->pdo]);
        $stmt->execute();
        return $stmt->fetch();
	}

	public function check()
	{
//        var_dump("in function check() van ". get_class($this));
//        var_dump("session user = " .$_SESSION['user']);
//        var_dump(session_id());
//        var_dump($_SESSION);
		return isset($_SESSION['user']);
	}

	public function attempt($email, $password)
	{
	    try{
//       var_dump("in function attempt van ". get_class($this));
        $sql = "select * from user where email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, User::class, [$this->pdo]);
        $stmt->execute();
        $user = $stmt->fetch();
	    } catch(\PDOException $e) {
	        //var_dump($e->getMessage());
        }

		if (! $user) {
			return false;
		}

		if (password_verify($password, $user->password)) {
            //session_regenerate_id();
			$_SESSION['user'] = $user->iduser;
			return true;
		}

		return false;
	}

	public function logout()
	{
        unset($_SESSION['user']);
        //unset($_SESSION['csrf']);
        session_destroy();
        //echo "sdlfkjsdflksdfj ";
	}
}
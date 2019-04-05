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
        $stmt->bindParam(':iduser', $_SESSION['user'], PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Exam::class, [$this->db]);
        $stmt->execute();
        return $stmt->fetch();
	}

	public function check()
	{
		return isset($_SESSION['user']);
	}

	public function attempt($email, $password)
	{
		//$user = User::where('email', $email)->first();
        $sql = "select * from user where email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':iduser', $email, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Exam::class, [$this->db]);
        $stmt->execute();
        $user = $stmt->fetch();

		if (! $user) {
			return false;
		}

		if (password_verify($password, $user->password)) {
			$_SESSION['user'] = $user->id;
			return true;
		}

		return false;
	}

	public function logout()
	{
		unset($_SESSION['user']);
	}
}
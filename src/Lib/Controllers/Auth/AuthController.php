<?php

namespace Lib\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

/**
 * AuthController
 *
 * @author    Haven Shen <havenshen@gmail.com>
 * @copyright    Copyright (c) Haven Shen
 */

class AuthController
{
    protected $db, $view;
    protected $exam, $proces, $assignments;

    public function __construct($db, $view)
    {
        $this->db = $db;
        $this->view = $view;

    }

    public function getSignOut($request, $response)
	{
		$this->auth->logout();
		return $response->withRedirect($this->router->pathFor('home'));
	}

	public function getSignIn($request, $response)
	{
		return $this->view->render($response, 'auth/signin.html');
	}

	public function postSignIn($request, $response)
	{
		$auth = $this->auth->attempt(
			$request->getParam('email'),
			$request->getParam('password')
		);

		if (! $auth) {
			$this->flash->addMessage('error', 'Could not sign you in with those details');
			return $response->withRedirect($this->router->pathFor('auth.signin'));
		}

		return $response->withRedirect($this->router->pathFor('home'));
	}

	public function getSignUp($request, $response)
	{
		return $this->view->render($response, 'auth/signup.html');
	}

	public function postSignUp($request, $response)
	{

		$validation = $this->validator->validate($request, [
			'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
			'name' => v::noWhitespace()->notEmpty()->alpha(),
			'password' => v::noWhitespace()->notEmpty(),
		]);

		if ($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('auth.signup'));
		}

		$user = User::create([
			'email' => $request->getParam('email'),
			'name' => $request->getParam('name'),
			'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
		]);

		$this->flash->addMessage('info', 'You have been signed up');

		$this->auth->attempt($user->email,$request->getParam('password'));

		return $response->withRedirect($this->router->pathFor('home'));
	}
}
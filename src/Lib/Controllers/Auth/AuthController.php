<?php

namespace Lib\Controllers\Auth;

use Lib\Models\User;
use Respect\Validation\Validator as v;

/**
 * AuthController
 *
 * @author    Haven Shen <havenshen@gmail.com>
 * @copyright    Copyright (c) Haven Shen
 */

class AuthController
{
    protected $auth, $db, $view, $validator;

    public function __construct($c)
    {
        $this->db = $c->get('db');
        $this->view = $c->get('view');
        $this->validator = $c->get('validator');
        $this->auth = $c->get('auth');
    }

    public function getSignOut($request, $response)
	{
		$this->auth->logout();
		return $response->withRedirect('/signin');
	}

	public function getSignIn($request, $response)
	{
        return $this->view->render($response, 'signin.html');

    }

	public function postSignIn($request, $response)
	{

	    $auth = $this->auth->attempt(
			$request->getParsedBodyParam('email'),
			$request->getParsedBodyParam('password')
		);

		if (! $auth) {
            return $this->view->render($response, 'signin.html');
		} else {
            return $response->withRedirect('/students');
        }


	}

	public function getSignUp($request, $response)
	{
		return $this->view->render($response, 'signup.html');
	}

	public function postSignUp($request, $response)
	{

		$validation = $this->validator->validate($request, [
			'email' => v::noWhitespace()->notEmpty()->email(),
            'first_name' => v::noWhitespace()->notEmpty()->alpha(),
            'last_name' => v::noWhitespace()->notEmpty()->alpha(),
			'password' => v::noWhitespace()->notEmpty(),
		]);

		if ($validation->failed()) {
			return $response->withRedirect('/signup');
		}

		$user = new User($this->db);
		$user->email = $request->getParam('email');
        $user->first_name = $request->getParam('first_name');
        $user->last_name = $request->getParam('last_name');
		$user->password = password_hash($request->getParam('password'), PASSWORD_DEFAULT);
		$user->save();

		$this->auth->attempt($user->email,$request->getParam('password'));

		return $response->withRedirect('/');
	}
}
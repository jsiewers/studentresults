<?php

namespace Lib\Controllers\Auth;

use Lib\Models\User;
use Lib\Models\Role;
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
        //var_dump($_SESSION);
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
        $user = new User($this->db);
        $role = new Role($this->db);
        $roles = $role->read();
        $users = $user->read();
		return $this->view->render($response, 'signup.html', [
		    'users' => $users,
            'roles' => $roles
        ]);
	}

	public function postSignUp($request, $response)
	{

		$validation = $this->validator->validate($request, [
			'email' => v::noWhitespace()->notEmpty()->email(),
            'first_name' => v::noWhitespace()->notEmpty()->alpha(),
            'last_name' => v::noWhitespace()->notEmpty()->alpha(),
			'password' => v::notEmpty()->length(8, 254),
            'roles' => v::arrayType()->notEmpty()
		]);

		if ($validation->failed()) {
			return $response->withRedirect('/signup');
		}

		$user = new User($this->db);
		$user->email = $request->getParam('email');
        $user->first_name = $request->getParam('first_name');
        $user->last_name = $request->getParam('last_name');
		$user->setPassword($request->getParam('password'));
		$user->roles = $request->getParsedBodyParam('roles');
		$user->save();

		//$this->auth->attempt($user->email,$request->getParam('password'));

		return $response->withRedirect('/');
	}
}
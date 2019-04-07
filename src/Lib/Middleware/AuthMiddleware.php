<?php

namespace Lib\Middleware;

/**
 * AuthMiddleware
 *
 * @author    Haven Shen <havenshen@gmail.com>
 * @copyright    Copyright (c) Haven Shen
 */
class AuthMiddleware extends Middleware
{

	public function __invoke($request, $response, $next)
	{
	    echo "in middleware";
		if(! $this->container->auth->check()) {
			//$this->container->flash->addMessage('error', 'Please sign in before doing that');
			//return $response->withRedirect('auth/signin');
		}

		$response = $next($request, $response);
		//return $response;
	}
}
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
		if(! $this->container->auth->check()) {
			return $response->withRedirect('/signin');
		}

		$response = $next($request, $response);
		return $response;
	}
}
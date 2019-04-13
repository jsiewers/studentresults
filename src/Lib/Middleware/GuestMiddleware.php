<?php

namespace Lib\Middleware;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * GuestMiddleware
 *
 * @author    Haven Shen <havenshen@gmail.com>
 * @copyright    Copyright (c) Haven Shen
 */
class GuestMiddleware extends Middleware
{

	public function __invoke($request, $response, $next)
	{
	    //var_dump("in middleware ".get_class($this));

        if(!$this->container->auth->check()) {
			return $response->withRedirect($this->container->router->pathFor('home'));
		}

		$response = $next($request, $response);
		return $response;
	}
}
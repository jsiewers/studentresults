<?php

namespace Lib\Middleware;


class AdminMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {
        if(! $this->container->auth->checkAdmin()) {
            return $response->withRedirect('/signin');
        }

        $response = $next($request, $response);
        return $response;
    }
}
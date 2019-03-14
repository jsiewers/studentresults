<?php

namespace Lib\Middleware;

class ValidationErrors extends Middleware {

    public function __invoke($request, $response, $next) {

        //do something
        $this->container->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
        unset($_SESSION['errors']);

        $response = $next($request, $response);
        return $response;

    }
}
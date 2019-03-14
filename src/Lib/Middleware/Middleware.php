<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-05
 * Time: 08:16
 */

namespace Lib\Middleware;


class Middleware
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

}
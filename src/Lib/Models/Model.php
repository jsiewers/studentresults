<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 08:23
 */

namespace Lib\Models;


use Psr\Container\ContainerInterface;

class Model
{
    protected $container;
    protected $pdo;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->pdo = $container->get('db');
   }

}
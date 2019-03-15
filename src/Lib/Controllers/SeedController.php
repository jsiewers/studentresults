<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 08:25
 */

namespace Lib\Controllers;
use Lib\Models\Student as Student;
use Lib\Models\Exam as Exam;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class SeedController
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function seed(Request $request, Response $response, array $args = []) {
        $student = new Student($this->db);
        //$student->setup();
        $exam = new Exam($this->db);
        $exam->seedTable();
    }
}
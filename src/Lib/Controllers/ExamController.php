<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 13:21
 */

namespace Lib\Controllers;
use Slim\Http\Request;
use Slim\Http\Response;

class ExamController

{
    protected $db, $view;

    public function __construct($db, $view)
    {
        $this->db = $db;
        $this->view = $view;
    }

    public function attempt(Request $request, Response $response, array $args = []) {

        $student = new Student($this->db);
        $attempt = new Exam($this->db);

         $this->view->render($response, 'attempt.html', [
            'student' =>  $student->readById($request->getAttribute('idstudent')),
             'attempt' => $attempt->readById($request->getAttribute('idexam')),
        ]);
    }
}

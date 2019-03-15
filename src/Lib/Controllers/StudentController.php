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
use Lib\Models\Student;

class StudentController

{
    protected $db, $view;

    public function __construct($db, $view)
    {
        $this->db = $db;
        $this->view = $view;
    }

    public function show(Request $request, Response $response, array $args = []) {

        $student = new Student($this->db);
        $student->read();
        $this->view->render($response, 'students.html', [
            'students' => $student->read(),
        ]);
    }
}

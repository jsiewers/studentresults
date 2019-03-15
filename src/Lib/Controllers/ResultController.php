<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 11:44
 */

namespace Lib\Controllers;
use Lib\Models\Student;
use Lib\Models\Exam;
use Lib\Models\Result;
use Slim\Http\Request;
use Slim\Http\Response;

class ResultController
{
    protected $db;

    public function __construct($db, $view)
    {
        $this->db = $db;
        $this->view = $view;
    }

    public function results(Request $request, Response $response, array $args = []) {
        $student = new Student($this->db);
        $exam = new Exam($this->db);
        $er = new Result($this->db);

        $this->view->render($response, 'results.html', [
            'student' => $student->readById($request->getAttribute('idstudent')),
            'exams' => $exam->read(),
            'examresults' => $er->examResultsByStudent($request->getAttribute('idstudent')),
        ]);
    }
}
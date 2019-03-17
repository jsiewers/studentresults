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
use Lib\Models\Exam;
use Lib\Models\Student;

class ExamController

{
    protected $db, $view;

    public function __construct($db, $view)
    {
        $this->db = $db;
        $this->view = $view;
    }

    public function attempt(Request $request, Response $response, array $args = []) {
        $idexam = $request->getAttribute('idexam');
        $student = new Student($this->db);
        $exam = new Exam($this->db);
        $attempt = $exam->readExamWithDeps($idexam);

         $this->view->render($response, 'attempt.html', [
             'student' =>  $student->readById($request->getAttribute('idstudent')),
             'attempt' => $attempt,
             'exam' => $exam,

        ]);
    }

    public function new_form(Request $request, Response $response, array $args = []) {
        $exam = new Exam($this->db);
        $exams = $exam->read();
        $this->view->render($response, 'new_exam.html', [
            'exams' => $exams,
        ]);
    }

    public function save(Request $request, Response $response, array $args = []) {
        $exam = new Exam($this->db);
        $exam->idexam = ($request->getParsedBodyParam('idexam'));
        $exam->description = ($request->getParsedBodyParam('description'));
        $exam->save();

        $exams = $exam->read();
        $this->view->render($response, 'new_exam.html', [
            'exams' => $exams,
        ]);
    }
}



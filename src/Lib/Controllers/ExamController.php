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
use Lib\Models\User;

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
        $user = new User($this->db);
        $assessors = $user->readByRole(2); //get accessors
        $exam = $exam->readById($idexam);


         $this->view->render($response, 'attempt.html', [
             'student' =>  $student->readById($request->getAttribute('idstudent')),
             'attempt' => $attempt,
             'exam' => $exam,
             'assessors' => $assessors,

        ]);
    }

    public function new_form(Request $request, Response $response, array $args = []) {
        $exam = new Exam($this->db);
        $exams = $exam->read();
        $new_exams = $exam->readAll();
        $this->view->render($response, 'new_exam.html', [
            'exams' => $exams,
            'new_exams' => $new_exams,
        ]);
    }

    public function save(Request $request, Response $response, array $args = []) {
        $exam = new Exam($this->db);
        $exam->idexam = ($request->getParsedBodyParam('idexam'));
        $exam->description = ($request->getParsedBodyParam('description'));
        $exam->caesura = ($request->getParsedBodyParam('caesura'));
        $exam->examcode = ($request->getParsedBodyParam('examcode'));
        $exam->save();

        $exams = $exam->read();
        $this->view->render($response, 'new_exam.html', [
            'exams' => $exams,
        ]);
    }
}



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
        $result = new Result($this->db);

        $this->view->render($response, 'results.html', [
            'student' => $student->readById($request->getAttribute('idstudent')),
            'exams' => $exam->read(),
            'examresults' => $result->examResultsByStudent($request->getAttribute('idstudent')),
        ]);
    }

    public function save(Request $request, Response $response, array $args = []) {
        foreach($request->getParsedBody() as $key => $value) {
            if(substr($key, 0,1) == "_") {
                $result = new Result($this->db);
                $result->idstudent = $request->getAttribute("idstudent");
                $result->exam_date = $request->getParsedBodyParam("exam_date");
                $result->idaspect = $value;
                $result->save();
            }

        }
        $this->results( $request,  $response, $args = []);
    }

    public function detail(Request $request, Response $response, array $args = []) {
        if($request->getAttribute('template') == 'detail') {
            $template = 'result_detail.html';
        } else {
            $template = 'result_proces.html';
        }
        $student = new Student($this->db);
        $exam = new Exam($this->db);
        $exam->readById($request->getAttribute('idexam'));

        $result = new Result($this->db);
        $result->exam_date = $request->getAttribute("exam_date");
        $result->idstudent = $request->getAttribute("idstudent");
        $result->idexam = $request->getAttribute("idexam");
        $examresults = $result->resultsByExam();
        $result->exam_score = $examresults['exam_score'];
        $caesura = explode(" ",$exam->caesura);
        $result->exam_grade = $caesura[$result->exam_score];


        $this->view->render($response, $template, [
            'student' => $student->readById($request->getAttribute('idstudent')),
            'exam' => $exam,
            'results' => $examresults['result'],
            'result' => $result
        ]);

    }
}
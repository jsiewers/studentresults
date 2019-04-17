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
use Lib\Models\Result_comment;
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
        $result->getStudentExams($request->getAttribute('idstudent'));

        $this->view->render($response, 'results.html', [
            'student' => $student->readById($request->getAttribute('idstudent')),
            'exams' => $exam->readAll(),
            'examresults' => $result->examResultsByStudent($request->getAttribute('idstudent')),
        ]);
    }

    public function deleteResult(Request $request, Response $response, array $args = []) {
        $result = new Result($this->db);
        $result->idexam = ($request->getAttribute('idexam'));
        $result->exam_date = ($request->getAttribute('exam_date'));
        $result->idstudent = ($request->getAttribute('idstudent'));
        $result->delete();

        $result_comment = new Result_comment($this->db);
        $result_comment->idexam = ($request->getAttribute('idexam'));
        $result_comment->exam_date = ($request->getAttribute('exam_date'));
        $result_comment->idstudent = ($request->getAttribute('idstudent'));
        $result_comment->delete();


        //$this->studentResults($request, $response, $args = []);
        $this->results($request, $response, $args = []);
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
        $result_comment = new Result_comment($this->db);
        $result_comment->comment = $request->getParsedBodyParam('comment');
        $result_comment->exam_date = $request->getParsedBodyParam("exam_date");
        $result_comment->idstudent = $request->getAttribute("idstudent");
        $result_comment->idexam = $request->getAttribute('idexam');
        $result_comment->save();
        $this->results( $request,  $response, $args = []);
    }

    public function studentResults(Request $request, Response $response, array $args = []) {
        $result = new Result($this->db);
        $result->idexam = ($request->getAttribute('idexam'));
        $result->exam_date = ($request->getAttribute('exam_date'));
        $result = $result->resultsByExamStudents();

        $this->view->render($response, 'results_exam_date.html', [
            'result' => $result,
        ]);

    }

    public function studentResultsAll(Request $request, Response $response, array $args = []) {
        $result = new Result($this->db);
        $result->idexam = ($request->getAttribute('idexam'));
        $dates = $result->getExamDates();
        foreach($dates as $date) {
            $result->exam_date = $date['exam_date'];
            $results[] = $result->resultsByExamStudents();
            }

        //var_dump($results);

        $this->view->render($response, 'results_exam.html', [
            'results' => $results,
        ]);

    }

    public function detail(Request $request, Response $response, array $args = []) {
        $student = new Student($this->db);
        $student = $student->readById($request->getAttribute("idstudent"));
        $exam = new Exam($this->db);
        $result = new Result($this->db);
        $result->idstudent = $request->getAttribute("idstudent");
        //$result->idexam = $request->getAttribute("idexam");
        $exams[0]['idexam'] = $request->getAttribute('idexam');
        $exams[0]['exam_date'] = $request->getAttribute('exam_date');

        if($request->getAttribute('template') == 'detail') {
            $template = 'result_detail.html';
        } elseif($request->getAttribute('template') == 'proces') {
            $template = 'result_proces.html';
        } else {
            $template = 'results_detail_all.html';
            $exams = $result->getStudentExams($request->getAttribute("idstudent"));
        }


        foreach($exams as $e) {
            $result = new Result($this->db);

            $ex = $exam->readById($e['idexam']);

            $result_comment = new Result_comment($this->db);
            $result_comment->idstudent = $request->getAttribute("idstudent");
            $result_comment->idexam =  $e['idexam'];
            $result_comment->exam_date = $e['exam_date'];

            $result->idstudent = $request->getAttribute("idstudent");
            $result->idexam = $e['idexam'];
            $result->exam_date = $e['exam_date'];

            $result_comment = $result_comment->read();

            $examresults = $result->resultsByExam();
            $result->exam_score = $examresults['exam_score'];
            $caesura = explode(" ", $ex->caesura);
            $result->exam_grade = str_replace(",",".", $caesura[$result->exam_score]);
            $results[] = ['exam' => $ex, 'examresults' => $examresults, 'result' => $result];
        }

       // var_dump($result_comment->comment);

        if($template != 'results_detail_all.html') {
            $args = [
                'student' => $student,
                'exam' => $results[0]['exam'],
                'results' => $results[0]['examresults']['result'],
                'result' => $results[0]['result'],
                'comment' => $result_comment->comment
            ];
        } else {
            $args = [
                'student' => $student,
                'results' => $results,
                'comment' => $result_comment->comment
            ];
       }

        $this->view->render($response, $template, $args);


    }
}
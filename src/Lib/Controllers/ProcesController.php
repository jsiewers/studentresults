<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-16
 * Time: 11:48
 */

namespace Lib\Controllers;
use Slim\Http\Request;
use Slim\Http\Response;
use Lib\Models\Exam;
use Lib\Models\Proces;


class ProcesController
{
    protected $db, $view;

    public function __construct($db, $view)
    {
        $this->db = $db;
        $this->view = $view;
    }


    public function new_form(Request $request, Response $response, array $args = []) {
        $exam = new Exam($this->db);
        $exams = $exam->read();

        $proces = new Proces($this->db);
        $processes = $proces->read();

        $this->view->render($response, 'new_proces.html', [
            'exams' => $exams,
            'idexam' => $request->getParsedBodyParam('idexam'),
            'processes' => $processes,
        ]);
    }

    public function save(Request $request, Response $response, array $args = []) {
        $proces = new Proces($this->db);
        $proces->idexam = ($request->getParsedBodyParam('idexam'));
        $proces->description = ($request->getParsedBodyParam('description'));
        if(!empty($proces->description)) {
            $proces->save();
        }

        $exam = new Exam($this->db);
        $exams = $exam->read();

        $processes = $proces->readByExam($proces->idexam);

        $this->view->render($response, 'new_proces.html', [
            'exams' => $exams,
            'idexam' => $proces->idexam,
            'processes' => $processes,
        ]);
    }
}

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
use Lib\Models\Assignment;


class AssignmentController
{
    protected $db, $view;

    public function __construct($db, $view)
    {
        $this->db = $db;
        $this->view = $view;
    }


    public function new_form(Request $request, Response $response, array $args = [])
    {
        $idexam = $request->getAttribute('idexam');
        $idproces = $request->getAttribute('idproces');
        $exam = new Exam($this->db);
        $exam = $exam->readById($idexam);

        $proces = new Proces($this->db);
        $processes = $proces->readByExam($idexam);
        $proces = $proces->readById($idproces);

        $assignment = new Assignment($this->db);
        $assignments = $assignment->readByProces($proces->idproces);


        $this->view->render($response, 'new_assignment.html', [
            'exam' => $exam,
            'proces' => $proces,
            'idproces' => $idproces,
            'processes' => $processes,
            'assignments' => $assignments,
        ]);
    }

    public function save(Request $request, Response $response, array $args = [])
    {
        $idexam = $request->getAttribute('idexam');
        $idproces = $request->getParsedBodyParam('idproces');

        $exam = new Exam($this->db);
        $exam = $exam->readById($idexam);

        $proces = new Proces($this->db);
        $processes = $proces->readByExam($idexam);
        $proces = $proces->readById($idproces);

        $assignment = new Assignment($this->db);
        $assignment->idproces = $idproces;
        $assignment->description = ($request->getParsedBodyParam('description'));
        if (!empty($assignment->description)) {
            $assignment->save();
        }
        $assignments = $assignment->readByProces($idproces);


        $this->view->render($response, 'new_assignment.html', [
            'exam' => $exam,
            'proces' => $proces,
            'idproces' => $idproces,
            'processes' => $processes,
            'assignments' => $assignments,
            'processes' => $processes,
        ]);
    }
}

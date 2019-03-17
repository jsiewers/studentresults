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
use Lib\Models\Aspect;


class AspectController
{
    protected $db, $view;
    protected $exam, $proces, $assignments;

    /**
     * AspectController constructor.
     * @param $db
     * @param $view
     */
    public function __construct($db, $view)
    {
        $this->db = $db;
        $this->view = $view;

    }


    public function new_form(Request $request, Response $response, array $args = [])
    {
        $idexam = $request->getAttribute('idexam');
        $idproces = $request->getAttribute('idproces');
        $idassignment = $request->getAttribute('idassignment');

        $exam = new Exam($this->db);
        $exam = $exam->readById($idexam);

        $proces = new Proces($this->db);
        $proces = $proces->readById($idproces);

        $assignment = new Assignment($this->db);
        $assignments = $assignment->readByProces($proces->idproces);

        $aspect = new Aspect($this->db);
        $aspects = $aspect->readByAssignment($idassignment);



        $this->view->render($response, 'new_aspect.html', [
            'exam' => $exam,
            'proces' => $proces,
            'idassignment' => $idassignment,
            'assignments' => $assignments,
            'aspects' => $aspects,
        ]);
    }

    public function save(Request $request, Response $response, array $args = [])
    {
        $idexam = $request->getAttribute('idexam');
        $idproces = $request->getAttribute('idproces');
        $idassignment = $request->getAttribute('idassignment');

        $exam = new Exam($this->db);
        $exam = $exam->readById($idexam);

        $proces = new Proces($this->db);
        $proces = $proces->readById($idproces);

        $assignment = new Assignment($this->db);
        $assignments = $assignment->readByProces($proces->idproces);

        $aspect = new Aspect($this->db);
        $aspect->idassignment = $idassignment;
        $aspect->description = $request->getParsedBodyParam('description');
        $aspect->score = $request->getParsedBodyParam('score');

        if (!empty($aspect->description)) {
            $aspect->save();
        }
        $aspects = $aspect->readByAssignment($idassignment);


        $this->view->render($response, 'new_aspect.html', [
            'exam' => $exam,
            'proces' => $proces,
            'idassignment' => $idassignment,
            'assignments' => $assignments,
            'aspects' => $aspects,
        ]);
    }

    public function update(Request $request, Response $response, array $args = []) {

        $idexam = $request->getAttribute('idexam');
        $idproces = $request->getAttribute('idproces');
        $idassignment = $request->getAttribute('idassignment');
        $idaspect = $request->getAttribute('idaspect');

        $exam = new Exam($this->db);
        $exam = $exam->readById($idexam);

        $proces = new Proces($this->db);
        $proces = $proces->readById($idproces);

        $assignment = new Assignment($this->db);
        $assignments = $assignment->readByProces($proces->idproces);

        $aspect = new Aspect($this->db);
        $aspect->idaspect = $idaspect;
        $aspect->idassignment = $idassignment;
        $aspect->description = $request->getParsedBodyParam('description');
        $aspect->score = $request->getParsedBodyParam('score');

        if (!empty($aspect->description)) {
            $aspect->update();
        }
        $aspects = $aspect->readByAssignment($idassignment);

        $this->view->render($response, 'new_aspect.html', [
            'exam' => $exam,
            'proces' => $proces,
            'idassignment' => $idassignment,
            'assignments' => $assignments,
            'aspects' => $aspects,
        ]);
    }
}

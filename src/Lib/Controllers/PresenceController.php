<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-27
 * Time: 11:30
 */

namespace Lib\Controllers;

use Lib\Models\Exam;
use Lib\Models\Presence;
use Slim\Http\Request;
use Slim\Http\Response;


class PresenceController
{
    protected $db, $view;

    public function __construct($db, $view)
    {
        $this->db = $db;
        $this->view = $view;
    }

    public function show(Request $request, Response $response, array $args = []) {
        //$exam = new Exam($this->db);
        $presence = new Presence($this->db);
        //$presence->startdatetime = date('Y-m-d\TH:i', mktime(8, 30, 0, date('m'),date('d'),date('Y')));
        $students = [];

        if($request->getParsedBodyParam('title')) {
            $presence->title = $request->getParsedBodyParam('title');
            $students =  $presence->readByTitle();
        }

        $this->view->render($response, 'presence.html', [
           // 'exams' => $exam->read(),
            'titles' => $presence->readTitles(),
            'students' => $students,
          //  'presence' => $presence,
        ]);
    }

    public function save(Request $request, Response $response, array $args = []) {
        $exam = new Exam($this->db);
        $presence = new Presence($this->db);
         $exam = $exam->readById($request->getParsedBodyParam('idexam'));
        $students = array_map('trim' , explode(",", $request->getParsedBodyParam('students')));
        $presence->title = $request->getParsedBodyParam('title');
        $presence->idexam = $request->getParsedBodyParam('idexam');
        $presence->startdatetime = $request->getParsedBodyParam('startdatetime');
        $presence->enddatetime = $request->getParsedBodyParam('enddatetime');

        foreach($students as $student) {
            $presence->idstudent = $student;
            $presence->save();
        }

        $this->view->render($response, 'presence.html', [
            'exam' => $exam,
            'students' => $presence->readByTitle(),
        ]);
    }


}

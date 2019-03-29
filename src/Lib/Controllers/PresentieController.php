<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-27
 * Time: 11:30
 */

namespace Lib\Controllers;

use Lib\Models\Exam;
use Lib\Models\Presentie;
use Slim\Http\Request;
use Slim\Http\Response;


class PresentieController
{
    protected $db, $view;

    public function __construct($db, $view)
    {
        $this->db = $db;
        $this->view = $view;
    }

    public function show(Request $request, Response $response, array $args = []) {

        $exam = new Exam($this->db);
        $presenties = new Presentie($this->db);

        $this->view->render($response, 'presentie.html', [
            'exams' => $exam->read(),
            'presenties' => $presenties->read()
        ]);
    }

    public function save(Request $request, Response $response, array $args = []) {

        $this->view->render($response, 'presentie.html', [
            'exams' => $exam->read(),
            'presenties' => $presenties->read()
        ]);
    }


}

<?php

use Slim\Http\Request;
use Slim\Http\Response;


$app->get('/seed', 'SeedController:seed');
$app->get('/exam/new', 'ExamController:new_form');
$app->post('/exam/new', 'ExamController:save');
$app->get('/proces/{idexam}/new', 'ProcesController:new_form');
$app->post('/proces/{idexam}/new', 'ProcesController:save');
$app->get('/assignment/{idexam}/{idproces}/new', 'AssignmentController:new_form');
$app->post('/assignment/{idexam}/{idproces}/new', 'AssignmentController:save');
$app->get('/aspect/{idexam }/{idproces }/{idassignment}/new', 'AspectController:new_form');
$app->post('/aspect/{idexam }/{idproces }/{idassignment}/new', 'AspectController:save');
$app->post('/aspect/{idexam }/{idproces }/{idassignment}/{idaspect}/update', 'AspectController:update');
$app->get('/results/{idstudent}', 'ResultController:results');
$app->get('/result/{idstudent}/{idexam}/{exam_date}/{template}', 'ResultController:detail');
$app->get('/result/{idexam}/{exam_date}', 'ResultController:studentResults');
$app->get('/results/{idexam}/all', 'ResultController:studentResultsAll');
$app->get('/students', 'StudentController:show');
$app->get('/students/{idstudent}/{idexam}/{exam_date}', 'StudentController:delete');
$app->post('/students/import', 'StudentController:import');
$app->get('/attempt/{idstudent}/{idexam}', 'ExamController:attempt');
$app->post('/attempt/{idstudent}/{idexam}', 'ResultController:save');

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

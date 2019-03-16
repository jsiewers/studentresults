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
$app->get('/results/{idstudent}', 'ResultController:results');
$app->get('/students', 'StudentController:show');
$app->get('/attempt/{idstudent}/{idexam}', 'ExamController:attempt');

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

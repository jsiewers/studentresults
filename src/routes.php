<?php

use Slim\Http\Request;
use Slim\Http\Response;


$app->get('/seed', 'SeedController:seed');
$app->get('/results/{idstudent}', 'ResultController:results');
$app->get('/students', 'StudentController:show');
$app->get('/attempt/{idstudent}/{idexam}', 'ExamController:attempt');

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Lib\Middleware\GuestMiddleware;
use Lib\Middleware\AuthMiddleware;
use Lib\Middleware\AdminMiddleware;
use Lib\Middleware\CsrfViewMiddleware;


//$app->get('/seed', 'SeedController:seed');

$app->get('/signout', 'AuthController:getSignOut')->setName('auth.signout');
$app->post('/signin', 'AuthController:postSignIn');
$app->get('/signin', 'AuthController:getSignIn')->setName('auth.signin');


//Authentication
$app->group('', function () {
    //$this->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
    //$this->post('/signup', 'AuthController:postSignUp');
//    $this->post('/signin', 'AuthController:postSignIn');
     //$this->get('/signout', 'AuthController:getSignOut');
})->add(new GuestMiddleware($container));


$app->group('', function () {
    $this->get('/result/{idstudent}/{idexam}/{exam_date}', 'ResultController:test');


    $this->get('/exam/new', 'ExamController:new_form');
    $this->post('/exam/new', 'ExamController:save');
    $this->get('/proces/{idexam}/new', 'ProcesController:new_form');
    $this->post('/proces/{idexam}/new', 'ProcesController:save');
    $this->get('/assignment/{idexam}/{idproces}/new', 'AssignmentController:new_form');
    $this->post('/assignment/{idexam}/{idproces}/{idassignment}/update', 'AssignmentController:update');
    $this->post('/assignment/{idexam}/{idproces}/new', 'AssignmentController:save');
    $this->get('/aspect/{idexam }/{idproces }/{idassignment}/new', 'AspectController:new_form');
    $this->post('/aspect/{idexam }/{idproces }/{idassignment}/new', 'AspectController:save');
    $this->post('/aspect/{idexam }/{idproces }/{idassignment}/{idaspect}/update', 'AspectController:update');
    $this->get('/results/{idstudent}', 'ResultController:results')->setName('student.results');
    $this->get('/newresult/{idstudent}/{idexam}/{exam_date}', 'ResultController:newresult');
    $this->get('/all_newresults/{idstudent}', 'ResultController:all_newresults');
    $this->get('/result/{idstudent}/{idexam}/{exam_date}/{template}', 'ResultController:detail');
    $this->get('/result/{idstudent}/{idexam}/{exam_date}/{template}/delete', 'ResultController:deleteResult');
    $this->get('/result/{idexam}/{exam_date}', 'ResultController:studentResults');
    $this->get('/results/{idexam}/all', 'ResultController:studentResultsAll');
    $this->get('/studentresults/{idstudent}/all', 'ResultController:detail');
    $this->get('/students/{idstudent}/{idexam}/{exam_date}', 'StudentController:delete');
    $this->post('/students/import', 'StudentController:import');
    $this->get('/attempt/{idstudent}/{idexam}', 'ExamController:attempt');
    $this->post('/attempt/{idstudent}/{idexam}', 'ResultController:save');
    //$app->get('/presence', 'PresenceController:show');
    //$app->post('/presence/store', 'PresenceController:save');
    //$app->post('/presence', 'PresenceController:show');
    $this->get('/students', 'StudentController:show');
    $this->post('/students', 'StudentController:show');
})->add(new AuthMiddleware($container));

$app->group('', function () {
    $this->get('/signup', 'AuthController:getSignUp')->setName('auth.signup');
    $this->post('/signup', 'AuthController:postSignUp');
})->add(new AdminMiddleware($container));



$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("Slim-Skeleton '/' route");

    // Render index view

    return $this->view->render($response, 'signin.html');
})->setName('home');

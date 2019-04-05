<?php

use Slim\Http\Request;
use Slim\Http\Response;


//$app->get('/seed', 'SeedController:seed');
$app->get('/exam/new', 'ExamController:new_form');
$app->post('/exam/new', 'ExamController:save');
$app->get('/proces/{idexam}/new', 'ProcesController:new_form');
$app->post('/proces/{idexam}/new', 'ProcesController:save');
$app->get('/assignment/{idexam}/{idproces}/new', 'AssignmentController:new_form');
$app->post('/assignment/{idexam}/{idproces}/{idassignment}/update', 'AssignmentController:update');
$app->post('/assignment/{idexam}/{idproces}/new', 'AssignmentController:save');
$app->get('/aspect/{idexam }/{idproces }/{idassignment}/new', 'AspectController:new_form');
$app->post('/aspect/{idexam }/{idproces }/{idassignment}/new', 'AspectController:save');
$app->post('/aspect/{idexam }/{idproces }/{idassignment}/{idaspect}/update', 'AspectController:update');
$app->get('/results/{idstudent}', 'ResultController:results');
$app->get('/result/{idstudent}/{idexam}/{exam_date}/{template}', 'ResultController:detail');
$app->get('/result/{idstudent}/{idexam}/{exam_date}/{template}/delete', 'ResultController:deleteResult');
$app->get('/result/{idexam}/{exam_date}', 'ResultController:studentResults');
$app->get('/results/{idexam}/all', 'ResultController:studentResultsAll');
$app->get('/studentresults/{idstudent}/all', 'ResultController:detail');
$app->get('/students', 'StudentController:show');
$app->post('/students', 'StudentController:show');
$app->get('/students/{idstudent}/{idexam}/{exam_date}', 'StudentController:delete');
$app->post('/students/import', 'StudentController:import');
$app->get('/attempt/{idstudent}/{idexam}', 'ExamController:attempt');
$app->post('/attempt/{idstudent}/{idexam}', 'ResultController:save');
$app->get('/presence', 'PresenceController:show');
$app->post('/presence/store', 'PresenceController:save');
$app->post('/presence', 'PresenceController:show');


//Authentication
$app->group('', function () {
    $this->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
    $this->post('/auth/signup', 'AuthController:postSignUp');
    $this->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
    $this->post('/auth/signin', 'AuthController:postSignIn');
})->add(new GuestMiddleware($container));



$app->group('', function () {
    $this->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');
    $this->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');
    $this->post('/auth/password/change', 'PasswordController:postChangePassword');
})->add(new AuthMiddleware($container));


$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'auth/signin.html', $args);
});

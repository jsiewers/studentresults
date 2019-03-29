<?php
// DIC configuration
use Lib\Controllers\SeedController;
use Lib\Controllers\ResultController;
use Lib\Controllers\StudentController;
use Lib\Controllers\ExamController;
use Lib\Controllers\ProcesController;
use Lib\Controllers\AssignmentController;
use Lib\Controllers\AspectController;
use Lib\Controllers\PresenceController;

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container['uploads'] = function ($c) {
    return $c['settings']['uploads']['uploads_path'];
};

$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig('templates', [
        'cache' => 'logs',
        'debug' => true
    ]);

    // Instantiate and add Slim specific extension
    $router = $c->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

$container['Student'] = function ($c) {
    return new Student($c->get('db'));
};

$container['Result'] = function ($c) {
    return new Result($c->get('db'));
};

$container['Aspect'] = function ($c) {
    return new Aspect($c->get('db'));
};

$container['Presence'] = function ($c) {
    return new Presence($c->get('db'));
};


$container['SeedController'] = function ($c) {
    return new SeedController($c->get('db'));
};

$container['ResultController'] = function ($c) {
    return new ResultController($c->get('db'), $c->get('view'));
};

$container['StudentController'] = function ($c) {
    return new StudentController($c->get('db'), $c->get('view'), $c->get('uploads'));
};

$container['ExamController'] = function ($c) {
    return new ExamController($c->get('db'), $c->get('view'));
};

$container['ProcesController'] = function ($c) {
    return new ProcesController($c->get('db'), $c->get('view'));
};

$container['AssignmentController'] = function ($c) {
    return new AssignmentController($c->get('db'), $c->get('view'));
};
$container['AspectController'] = function ($c) {
    return new AspectController($c->get('db'), $c->get('view'));
};

$container['PresenceController'] = function ($c) {
    return new PresenceController($c->get('db'), $c->get('view'));
};

$container['validator'] = function($c) {
    return new \Lib\Validators\Validator;
};
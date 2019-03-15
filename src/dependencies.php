<?php
// DIC configuration
use Lib\Controllers\SeedController;
use Lib\Controllers\ResultController;
use Lib\Controllers\StudentController;

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

$container['SeedController'] = function ($c) {
    return new SeedController($c->get('db'));
};

$container['ResultController'] = function ($c) {
    return new ResultController($c->get('db'), $c->get('view'));
};

$container['StudentController'] = function ($c) {
    return new StudentController($c->get('db'), $c->get('view'));
};

$container['ExamController'] = function ($c) {
    return new ExamController($c->get('db'), $c->get('view'));
};
$container['validator'] = function($c) {
    return new \Lib\Validators\Validator;
};
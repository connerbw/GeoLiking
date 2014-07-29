<?php

require '../config.php';
require '../vendor/autoload.php';

// Set utf-8
header('Content-Type: text/html;charset=utf-8');
mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');
mb_language('uni');

// Prepare app
$app = new \Slim\Slim(array(
    'mode' => 'development',
    'log.enabled' => true,
    'templates.path' => '../templates',
    'log.writer' => new \Slim\LogWriter(fopen('../logs/app.log', 'a')),
));


// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../tmp/templates'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true,
    'debug' => true,
);
$app->view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
    new Twig_Extension_Debug(),
);

// Define routes
$app->get(
    '/',
    function () use ($app) {
        // Sample log message
        $app->log->info("Slim-Skeleton '/' route");
        // Render index view
        $userPos = (new \Trotch\User(new \Trotch\Mapping()))->getPosition();
        $app->render('index.html', ['userPos' => $userPos]);
    }
);

// Run app
$app->run();
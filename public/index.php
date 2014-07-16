<?php

require '../config.php';
require '../vendor/autoload.php';

// Prepare app
$app = new \Slim\Slim(array(
    'mode' => 'development',
    'log.enabled' => true,
    'templates.path' => '../templates',
));

$app->environment['slim.errors'] = fopen('../logs/app.log', 'a');

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../tmp/templates'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

// Define routes
$app->get(
    '/',
    function () use ($app) {
        // Sample log message
        $app->log->info("Slim-Skeleton '/' route");
        // Render index view
        $app->render('index.html');
    }
);

// Run app
$app->run();
<?php

require '../config.php';
require '../vendor/autoload.php';

// Sessions
ini_set('session.use_only_cookies', true);
session_cache_limiter(false);
session_start();

// Set utf-8
header('Content-Type: text/html;charset=utf-8');
mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');
mb_language('uni');

// Prepare app
$app = new \Slim\Slim(array(
    'mode' => 'development',
    'templates.path' => '../templates',
    'log.enabled' => true,
    'log.writer' => new \Slim\LogWriter(fopen('../logs/app.log', 'a')),
));

// Define routes
$app->get(
    '/',
    function () use ($app) {
        // Render index view
        $lastKnownUserPos = (new \Trotch\User(new \Trotch\Mapping()))->getPosition();
        $app->render('boilerplate.php', ['lastKnownUserPos' => $lastKnownUserPos]);
    }
);

// Run app
$app->run();
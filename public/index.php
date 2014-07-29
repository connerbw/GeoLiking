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

/* Initialize reusable objects */

$mapper = new \Trotch\Mapper();
$user = new \Trotch\User($mapper);

/* Define routes */

$app->get(
    '/',
    function () use ($app, $user) {
        $app->render(
            'boilerplate.php', [
                'lastKnownUserPos' => $user->getPosition(),
            ]
        );
    }
);

$app->get(
    '/map',
    function () use ($app, $user) {
        $app->render(
            'map.php', [
                'lastKnownUserPos' => $user->getPosition(),
            ]
        );
    }
);

/* Run app */

$app->run();
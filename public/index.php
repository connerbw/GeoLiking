<?php

require '../config/config.php';
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

$c = new \Trotch\Container();

/* Define routes */

$app->get(
    '/',
    function () use ($app, $c) {

        $profile = $c::get('User')->getProfile();
        if (empty($profile)) {
            // Redirect to authenticate
        }

        $app->render(
            'boilerplate.php', [
                'lastKnownUserPos' => $c::get('User')->getPosition(),
            ]
        );
    }
);

$app->get(
    '/map',
    function () use ($app, $c) {
        $app->render(
            'map.php', [
                'lastKnownUserPos' => $c::get('User')->getPosition(),
            ]
        );
    }
);

$app->get(
    '/login',
    function () use ($app, $c) {
        $c::get('Auth')->authenticate('Twitter');
    }
);

$app->any(
    '/hybridauth',
    function () {
        include __DIR__ . '/../vendor/hybridauth/hybridauth/hybridauth/index.php';
    }
);


/* Run app */

$app->run();
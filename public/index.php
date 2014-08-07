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


/* Initialize services */

$c = \Trotch\Container::getInstance();

/* Define routes */

$app = $c::get('App');

$app->get(
    '/',
    function () use ($app, $c) {
        $r = new \Trotch\Renderer\Home($app, $c);
        $r->render();
    }
);

$app->get(
    '/map',
    function () use ($app, $c) {
        $r = new \Trotch\Renderer\Map($app, $c);
        $r->render();
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
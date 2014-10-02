<?php

require(__DIR__ . '/../config/config.php');
require(__DIR__ . '/initialize.php');

/* Define routes */

$c = new \Trotch\Container();

$app = $c::get('App');

$app->get(
    '/',
    function () use ($app, $c) {
        $r = new \Trotch\Renderer\Home();
        $r->render();
    }
);

$app->get(
    '/map',
    function () use ($app, $c) {
        $r = new \Trotch\Renderer\Map();
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
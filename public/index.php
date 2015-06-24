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
    '/position',
    function () use ($app, $c) {
        $r = new \Trotch\Renderer\Position();
        $r->render();
    }
);

$app->get(
    '/geolike',
    function () use ($app, $c) {
        $r = new \Trotch\Renderer\GeoLike();
        $r->render();
    }
);

$app->get(
    '/privacy',
    function () use ($app, $c) {
        $r = new \Trotch\Renderer\Privacy();
        $r->render();
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
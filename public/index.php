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


/* Initialize reusable objects */

$c = new \Trotch\Container();

/* Define routes */

$app = $c::get('App');

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

        $locations = array();
        foreach ($c::get('Db')->getTable('bars') as $bar) {
            $locations[] = [$bar->name, $bar->latitude, $bar->longitude];
        }

        $app->render(
            'map.php', [
                'locations' => $locations,
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
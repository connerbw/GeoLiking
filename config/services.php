<?php

// If you add stuff here, don't forget to also edit config/.phpstorm.meta.php

$c = new \Pimple\Container();

$c['App'] = function ($c) {
    global $CONFIG;

    return new \Slim\Slim(array(
        'mode' => $CONFIG['MODE'],
        'templates.path' => __DIR__ . '/../templates',
        'log.enabled' => true,
        'log.writer' => new \Slim\LogWriter(fopen(__DIR__ . '/../logs/app.log', 'a')),
    ));
};

$c['GeoLocation'] = function () {
    return new \GeoLiking\GeoLocation();
};

$c['Facebook'] = function ($c) {
    return new \GeoLiking\Facebook($c['GeoLocation']);
};

return $c;

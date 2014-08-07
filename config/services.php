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

$c['Db'] = function ($c) {
    global $CONFIG;
    return new \selective\ORM\Database(
        $CONFIG['DB_NAME'],
        $CONFIG['DB_DRIVER'],
        $CONFIG['DB_PARAMETERS'],
        isset($CONFIG['DB_CLASSMAPPER']) ? $CONFIG['DB_CLASSMAPPER'] : array()
    );
};

$c['Map'] = function ($c) {
    return new \Trotch\Map();
};

$c['User'] = function ($c) {
    return new \Trotch\User($c['Map']);
};

$c['Auth'] = function ($c) {
    return new \Trotch\Auth($c['User']);
};

return $c;
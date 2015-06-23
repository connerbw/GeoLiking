<?php

global $CONFIG;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

$CONFIG['MODE'] = 'development';

/**
 * @see http://hybridauth.sourceforge.net/userguide/Configuration.html
 */
$CONFIG['HYBRIDAUTH'] = array(
    'base_url' => 'http://geoliking.dev/hybridauth', // No trailing slash!
    'debug_mode' => true,
    'debug_file' => '/vagrant/logs/hybridauth.log',
    'providers' => [
        'Facebook' => [
            'enabled' => true,
            'keys' => [
                'id' => '__REPLACE_ME__',
                'secret' => '__REPLACE_ME__'
            ],
            'scope'   => 'publish_actions',
        ],
    ],
);

/**
 * Set this variable to an instance of \Pimple\Container if you want to override config/services.php
 * Useful for Unit Testing, etc.
 */
// $CONFIG['PIMPLE'] = '';

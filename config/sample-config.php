<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);


/**
 * @see http://hybridauth.sourceforge.net/userguide/Configuration.html
 */
$CONFIG['HYBRIDAUTH'] = array(
    'base_url' => 'http://localhost/trotch/hybridauth', // No trailing slash!
    'providers' => [
        'Twitter' => [
            'enabled' => true,
            'keys' => [
                'key' => '__REPLACE_ME__',
                'secret' => '__REPLACE_ME__'
            ]
        ],
    ],
);

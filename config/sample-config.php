<?php

global $CONFIG;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

/**
 * @see http://docs.slimframework.com/configuration/modes/
 */
$CONFIG['MODE'] = 'development';

/**
 * The url suffix to your site. For example, if your site is
 * http://www.geoliking.com/ then '/' is appropriate. If your site is
 * http://domain.com/foo/bar/ then '/foo/bar/' is the correct value.
 */
$CONFIG['URL'] = '/';

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
            'scope' => 'publish_actions',
        ],
    ],
);

/**
 * Set this variable to an instance of \Pimple\Container if you want to override config/services.php
 * Useful for Unit Testing, etc.
 */
// $CONFIG['PIMPLE'] = '';

<?php

require '../config.php';
require '../vendor/autoload.php';

$r = __DIR__;

$options = [
    'groups' => [
        'js' => [
            "{$r}/components/jquery/jquery.min.js",
            "{$r}/components/jquery-cookie/jquery.cookie.js",
            "{$r}/../templates/getCurrentPosition.js",
        ],
    ],
];

// With the above, if you request http://example.org/minify.php/js, Apache
// will set $_SERVER['PATH_INFO'] = '/js' and the sources in $options['groups']['js']
// will be served.

$options['groupsOnly'] = true;

// check for URI versioning
if (isset($_GET['v'])) {
    $options['maxAge'] = 31536000;
}

ini_set('zlib.output_compression', '0');
Minify::setCache(new Minify_Cache_File(realpath('../tmp'), true));
Minify::serve('Groups', $options);
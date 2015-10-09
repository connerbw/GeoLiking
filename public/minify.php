<?php

require '../config/config.php';
require '../vendor/autoload.php';

$options = [
    'groups' => [
        'css' => [
            '//components/foundation/css/normalize.css',
            '//components/foundation/css/foundation.min.css',
            '//css/base.css',
        ],
        'js-head' => [
            '//components/foundation/js/vendor/modernizr.js'
        ],
        'js-body' => [
            '//components/foundation/js/vendor/jquery.js',
            '//components/foundation/js/foundation.min.js',
            '//components/foundation/js/vendor/jquery.cookie.js',
            '//js/getCurrentUserPosition.js',
            '//js/FacebookSdk.js',
        ],
    ],
];

// With the above, if you request http://example.org/minify.php/js, Apache
// will set $_SERVER['PATH_INFO'] = '/js' and the sources in $options['groups']['js']
// will be served.

$_SERVER['DOCUMENT_ROOT'] = __DIR__;
Minify::$isDocRootSet = true;

$options['groupsOnly'] = true;

// check for URI versioning
if (isset($_GET['v'])) {
    $options['maxAge'] = 31536000;
}

ini_set('zlib.output_compression', '0');
Minify::setCache(new Minify_Cache_File(realpath(__DIR__ . '/../tmp'), true));
Minify::serve('Groups', $options);
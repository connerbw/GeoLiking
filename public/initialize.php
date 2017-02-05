<?php

global $CONFIG;

if (empty($CONFIG)) {
    die('$CONFIG not found.');
}

require(__DIR__ . '/../vendor/autoload.php');

// Sessions
ini_set('session.use_only_cookies', true);
session_cache_limiter(false);
session_start();

// Set utf-8
header('Content-Type: text/html;charset=utf-8');
mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');
mb_language('uni');

// Avoid problems with arg_separator.output
ini_set('arg_separator.output', '&');

// Initialize services
if (!empty($CONFIG['PIMPLE'])) {
    \GeoLiking\Container::init($CONFIG['PIMPLE']);
} else {
    \GeoLiking\Container::init();
}

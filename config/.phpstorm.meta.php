<?php
/**
 * @see http://confluence.jetbrains.com/display/PhpStorm/PhpStorm+Advanced+Metadata
 */
namespace PHPSTORM_META {

    /** @noinspection PhpUnusedLocalVariableInspection */
    /** @noinspection PhpIllegalArrayKeyTypeInspection */
    $STATIC_METHOD_TYPES = [
        \GeoLiking\Container::get('') => [
            'App' instanceof \Slim\Slim,
            'GeoLocation' instanceof \GeoLiking\GeoLocation,
            'Facebook' instanceof \GeoLiking\Facebook,
            'Log' instanceof \Slim\LogWriter,
        ]
    ];

}

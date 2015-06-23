<?php
/**
 * @see http://confluence.jetbrains.com/display/PhpStorm/PhpStorm+Advanced+Metadata
 */
namespace PHPSTORM_META {

    /** @noinspection PhpUnusedLocalVariableInspection */
    /** @noinspection PhpIllegalArrayKeyTypeInspection */
    $STATIC_METHOD_TYPES = [
        \Trotch\Container::get('') => [
            'App' instanceof \Slim\Slim,
            'GeoLocation' instanceof \Trotch\GeoLocation,
            'Facebook' instanceof \Trotch\Facebook,
            'Log' instanceof \Slim\LogWriter,
        ]
    ];

}
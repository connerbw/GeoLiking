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
            'Auth' instanceof \Trotch\Auth,
            'Log' instanceof \Slim\LogWriter,
            'Map' instanceof \Trotch\Map,
            'User' instanceof \Trotch\User,
        ]
    ];

}
<?php

namespace Trotch;

/**
 * Cheap factory style wrapper around \Pimple\Container() so that we can use
 * PhpStorm IDE to auto complete things.
 */
class Container
{
    /**
     * @var \Pimple\Container
     */
    protected static $instance;

    /**
     *
     */
    public function __construct()
    {
        if (!self::$instance) {
            self::init();
        }
    }

    /**
     * If you add stuff here, don't forget to also edit config/.phpstorm.meta.php
     */
    static function init()
    {
        $c = new \Pimple\Container();

        $c['Map'] = function ($c) {
            return new Map();
        };

        $c['User'] = function ($c) {
            return new User($c['Map']);
        };

        $c['Auth'] = function ($c) {
            return new Auth($c['User']);
        };

        self::$instance = $c;
    }


    /**
     * @param string $var
     * @return mixed
     */
    static function get($var)
    {
        if (!self::$instance) {
            self::init();
        }

        return self::$instance[$var];
    }

    /**
     * @return \Pimple\Container
     */
    static function getInstance()
    {
        if (!self::$instance) {
            self::init();
        }

        return self::$instance;
    }

}
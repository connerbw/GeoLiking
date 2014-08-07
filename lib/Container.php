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
     * @param \Pimple\Container $c (optional)
     */
    public function __construct($c = null)
    {
        if ($c) {
            static::$instance = $c;
        }
    }

    /**
     * If you add stuff here, don't forget to also edit config/.phpstorm.meta.php
     */
    static function init()
    {
        static::$instance = require(__DIR__ . '/../config/services.php');
    }

    /**
     * @param string $var
     * @return mixed
     */
    static function get($var)
    {
        if (!static::$instance) {
            static::init();
        }

        return static::$instance[$var];
    }

    /**
     * @return \Pimple\Container
     */
    static function getInstance()
    {
        if (!static::$instance) {
            static::init();
        }

        return static::$instance;
    }

}
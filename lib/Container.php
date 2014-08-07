<?php

namespace Trotch;

/**
 * Singleton (Boooo!)
 *
 * Cheap factory style wrapper around \Pimple\Container() so that we can use
 * PhpStorm IDE to auto-complete things.
 */
class Container
{

    /**
     * @var \Trotch\Container
     */
    protected static $instance;

    /**
     * @var \Pimple\Container
     */
    protected static $pimple;

    /**
     * Thou shalt not construct that which is unconstructable!
     */
    final private function __construct()
    {
    }

    /**
     * Me not like clones! Me smash clones!
     */
    final private function __clone()
    {
    }

    /**
     * If you add stuff here, don't forget to also edit config/.phpstorm.meta.php
     */
    protected static function init()
    {
        static::$pimple = require(__DIR__ . '/../config/services.php');
    }

    /**
     * @param string $var
     * @return mixed
     */
    static function get($var)
    {
        if (!static::$pimple) {
            static::init();
        }

        return static::$pimple[$var];
    }


    /**
     * @return Container
     */
    public static function getInstance()
    {
        if (!static::$instance) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    /**
     * @return \Pimple\Container
     */
    static function getPimple()
    {
        if (!static::$pimple) {
            static::init();
        }

        return static::$pimple;
    }

    /**
     * @param \Pimple\Container $pimple
     */
    public static function setPimple($pimple)
    {
        self::$pimple = $pimple;
    }

}
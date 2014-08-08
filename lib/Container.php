<?php

namespace Trotch;

/**
 * Cheap factory style wrapper around \Pimple\Container() so that we can use
 * PhpStorm IDE to auto-complete things.
 */
class Container
{

    /**
     * @var \Pimple\Container
     */
    protected static $pimple;

    /**
     * If you add stuff here, don't forget to also edit config/.phpstorm.meta.php
     */
    static function init()
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
     * @param string $key
     * @param mixed $val
     * @param string $type (optional)
     */
    static function set($key, $val, $type = null)
    {
        if (!static::$pimple) {
            static::init();
        }

        if ('factory' == $type) {
            static::$pimple[$key] = static::$pimple->factory($val);
        } elseif ('protect' == $type) {
            static::$pimple[$key] = static::$pimple->protect($val);
        } else {
            static::$pimple[$key] = $val;
        }
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
        static::$pimple = $pimple;
    }

}
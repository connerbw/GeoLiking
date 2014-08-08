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
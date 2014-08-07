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
        if (!static::$instance) {
            static::init();
        }
    }

    /**
     * If you add stuff here, don't forget to also edit config/.phpstorm.meta.php
     */
    static function init()
    {
        $c = new \Pimple\Container();

        $c['App'] = function ($c) {
            return new \Slim\Slim(array(
                'mode' => 'development',
                'templates.path' => __DIR__ . '/../templates',
                'log.enabled' => true,
                'log.writer' => new \Slim\LogWriter(fopen(__DIR__ . '/../logs/app.log', 'a')),
            ));
        };

        $c['Db'] = function ($c) {
            global $CONFIG;
            return new \selective\ORM\Database(
                $CONFIG['DB_NAME'],
                $CONFIG['DB_DRIVER'],
                $CONFIG['DB_PARAMETERS'],
                isset($CONFIG['DB_CLASSMAPPER']) ? $CONFIG['DB_CLASSMAPPER'] : array()
            );
        };

        $c['Map'] = function ($c) {
            return new Map();
        };

        $c['User'] = function ($c) {
            return new User($c['Map']);
        };

        $c['Auth'] = function ($c) {
            return new Auth($c['User']);
        };

        static::$instance = $c;
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
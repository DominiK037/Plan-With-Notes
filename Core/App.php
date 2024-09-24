<?php

namespace Core;

class App
{
    protected static $container;

    public static function setContainer($container)     //  Storing object instance created from Container.php class, into variable $container
    {
        static::$container = $container;        //  Initializing static $container
    }

    public static function container()
    {
        return static::$container;      //  Returning stored object in $container
    }

    public static function bind($key, $func)
    {
       static::$container->bind($key, $func);
    }

    public static function resolve($key)
    {
        return static::$container->resolve($key);
    }
}
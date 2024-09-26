<?php

namespace Core\Middleware;

use http\Exception;

class Middleware
{
    public const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class
    ];

    public static function resolve($key)
    {
        if (!$key){
            return;
        }

        $middleware = static::MAP[$key] ?? false;
        //  Middleware::MAP ->  const,
        //  [$route['middleware']] ->   $route -> array, 'middleware' -> key,   auth' / 'guest'
        //  In short $middleware =  Auth::class /   Guest::class

        if (!$middleware){
            throw new \Exception("There is no middleware defined as {$key}");
        }

        (new $middleware)->handle();
    }
}
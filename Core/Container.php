<?php

namespace Core;

class Container
{
    protected $bindings = [];       //  Saving the objects

    public function bind($key, $func)      //  add() is the similar name
    {
        $this->bindings[$key] = $func;      //  [$key] -> consider it an index of an array, $func -> value of that index
    }

    public function resolve($key)   //  retrieve() is the similar name
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception('No matching binding found with the key-> ' . $key);
        }

        $func = $this->bindings[$key];      //  getting a stored item from $bindings array (not deleting)
        return call_user_func($func);       //  Executing the value of an index i.e $func
    }
}
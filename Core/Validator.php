<?php

namespace Core;

class Validator
{
//  checking whether input string is empty or not
    public static function minMax($value, $min = 1, $max = 100)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
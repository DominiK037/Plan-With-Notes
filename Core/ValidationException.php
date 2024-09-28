<?php

namespace Core;

class ValidationException extends \Exception
{
    protected $errors;
    protected $old;

    public static function throw($errors, $old)
    {
        $instance = new static;

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getOld()
    {
        return $this->old;
    }
}
<?php

namespace http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    public array $attributes;
    protected $errors = [];

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;

        //  validate email
        if (!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address';
        }
        //  validate password
        if (!Validator::minMax($this->attributes['password'])) {
            $this->errors['password'] = 'Minimum 7 characters required';
        }
    }

    public function validate($attributes)
    {

        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->getErrors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    function displayError($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}
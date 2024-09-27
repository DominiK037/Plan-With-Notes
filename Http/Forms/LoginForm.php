<?php

namespace Http\Forms;
use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password)
    {
        //  validate email
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address';
        }
        //  validate password
        if (!Validator::minMax($password, 7, 255)) {
            $this->errors['password'] = 'Minimum 7 characters required';
        }
        return empty($this->errors);
    }
    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
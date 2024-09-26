<?php

namespace http\Forms;
use Core\Validator;
class LoginForm
{
    protected $errors = [];
    public function validate($email, $password): bool
    {
        $errors = [];
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

    public function getErrors(): array
    {
        return $this->errors;
    }

    function displayError($field, $message)
    {
        $this->errors[$field] = $message;
    }
}
<?php

namespace Core;
class Authenticator
{
    public function attempt($email, $password)
    {
        //  check if account already exists
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                //  marking user as logged in
                $this->login([
                       'email' => $email,
                ]);
                return true;
            }
        }
        return false;
    }

    function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }

    function logout()
    {
        Session::destroy();
    }
}
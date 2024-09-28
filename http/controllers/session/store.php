<?php

use Core\Authenticator;
use http\Forms\LoginForm;

$form = new LoginForm($attributes = []);

$form->validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);

if (!$signedIn) {

    $form->displayError(
        'email',
        'No matching email or password.'
    )->throw();
}

redirect('/');








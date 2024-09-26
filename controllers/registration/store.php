<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];;
$errors = [];

//  validate the form input
if(!Validator::email($email)){
    $errors['email'] = 'Please provide a valid email address';
}

if(!Validator::minMax($password, 7, 255)){
    $errors['password'] = 'Minimum 7 characters required';
}

if(!empty($errors)){
    require view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

//  check if the account is already existing
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user){

    login($user);

    //  then someone with that email already exist and has an account
    //  If yes, redirect to a login page
    header('Location: /');
    exit();
} else {

    //  If not, save one to the database, and then log the user in and redirect
    $db->query('insert into users (email, password) values (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    //  marking user as logged in
    login($user);

    header('Location: /');
    exit();
}
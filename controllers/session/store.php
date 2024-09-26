<?php

use Core\App;
use Core\Database;
use Core\Validator;

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
    return view('session/create.view.php', [
        'errors' => $errors
    ]);
}

//  check if the account already exists
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user) {
   if(password_verify($password, $user['password'])){

       //  marking user as logged in
       login([
           'email' => $email,
       ]);

       header("Location: /");
       exit();

   }
}

return view('session/create.view.php', [
   'errors' => [
       'email' => 'Please provide a valid email address',
   ]
]);


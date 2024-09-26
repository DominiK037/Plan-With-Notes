<?php

use Core\App;
use Core\Database;
use Core\Validator;
use http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];;

$form = new LoginForm();

if(! $form->validate($email, $password)) {
    return view('session/create.view.php',[
       'errors' => $form->getErrors()
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


<?php
require basePath('core/Validator.php');
$config = require basePath("config.php");
$db = new Database($config['database']);

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $body = $_POST['body'];     //  $_POST['body'] here $_POST is linked to method="post" and
                                // 'body' is name="body" of a html element

    if (! Validator::minMax($_POST['body'], 1, 100)) {   //  Reformatting for below 2 function
        $errors['body'] = 'INVALID INPUT';
    }
    //  strlen is a inbuilt function which tells the length of array (intention here: if there is any input given by the user in input tag)
    //  1.
    //if (strlen(trim($body)) === 0) {
    //        $errors['body'] = 'Please enter a body';
    //    }

    //  setting up limit for the number of chars in input
//    2.
//    if (strlen($body) > 100) {
//        $errors['body'] = 'INVALID INPUT';
//    }

    //  error array won't be empty unless user submits without actually giving any input
    //  i.e just spamming submit button without giving any inputs
    //  empty function check whether array is empty or not
    if (empty($errors)) {
        $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)',
            [
                'body' => $body,
                'user_id' => 1
            ]
        );
    }
}

require view("notes/create.view.php", [
   'heading' => 'Create Note',
    'errors' => $errors
]);
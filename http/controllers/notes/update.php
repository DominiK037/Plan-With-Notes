<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

//  Find the corresponding note
$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $_POST['id']
])->find();

//  Authorize that the current user can edit the note
isAuthorized($note['user_id'] === $currentUserId);

//  Validate the form
$errors = [];

if (!Validator::minMax($_POST['body'], 1, 101)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

//  If no validation errors
if (count($errors)) {
    return view('notes/update', [
        'errors' => $errors,
        'heading' => 'Edit Note',
        'note' => $note
    ]);
}

//  Then update the record in the notes database table
$db->query('UPDATE notes set body = :body WHERE id = :id', [
    'body' => $_POST['body'],
    'id' => $_POST['id']
]);

//  Redirect the user to notes afterwards
header('Location: /notes');
die();
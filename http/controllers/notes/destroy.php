<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);       //  Database::class-> translates full namespace path to the string

$currentUserId = 11;

$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $_POST['id']
])->find();

isAuthorized($note['user_id'] === $currentUserId);

//  form was submitted, delete the current note
$db->query("delete from notes where id = :id", [
    ":id" => $_POST['id']
]);

header('Location: /notes');
exit();
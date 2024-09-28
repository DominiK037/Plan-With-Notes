<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'];
$currentUserId = 11;

$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $id
])->find();

isAuthorized($note['user_id'] === $currentUserId);

require view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);
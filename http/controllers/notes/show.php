<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$id = $_GET['id'];
$currentUserId = 11;

$note = $db->query('SELECT * FROM notes where user_id = :user_id', [
    'user_id' => $_GET['user_id']
])->find();

isAuthorized($note['user_id'] === $currentUserId);

require view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
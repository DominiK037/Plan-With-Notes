<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$id = $_GET['id'];
$currentUserId = 1;

$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $_GET['id']
])->find();

isAuthorized($note['user_id'] === $currentUserId);

require view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
<?php

$config = require basePath("config.php");
$db = new Database($config['database']);

$id = $_GET['id'];
$currentUserId = 1;

$note = $db->query('SELECT * FROM notes where id = :id', ['id' => $id])->find();
//dd($note);

isAuthorized ($note['user_id'] === $currentUserId);
//  Above isAuthorized function is a reformatting of below if condition
//  Below we are checking whether note is created by user(i.e id column in user table) which is
//  linked to user_id column in the notes table by foreign key
//  if ($note['user_id'] !== $currentUserId) {
//      abort(Response::NOT_AUTHORIZED);
//  }

require view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
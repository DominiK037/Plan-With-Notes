<?php

$config = require basePath("config.php");
$db = new Database($config['database']);

$notes = $db->query('SELECT * FROM notes where user_id = 1')->get();

require view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes,
]);
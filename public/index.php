<?php

const BASE_PATH = __DIR__ . '/../';      //  __DIR__ -> current directory & /../ -> move one directory above in this case i.e demo

require BASE_PATH . "core/functions.php";

spl_autoload_register(function ($class) {
    require basePath("core/{$class}.php");
});
//echo basePath("core/router.php");
require basePath("core/router.php");

//$id = $_GET['id'];
//$query = "select * from posts where id = :id";
//
//$posts = $db->query($query, ['id' => $id]);
//
//dd($posts);

//$id = $_GET['id'];
//
//$query = "SELECT * FROM users WHERE id = :id";
//
//$posts = $db->query($query, [':id' => $id]);
//
//dd($posts);

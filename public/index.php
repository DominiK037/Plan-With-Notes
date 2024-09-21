<?php

const BASE_PATH = __DIR__ . '/../';      //  __DIR__ -> current directory & /../ -> move one directory above in this case i.e demo

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require basePath("{$class}.php");
});

require basePath("Core/router.php");


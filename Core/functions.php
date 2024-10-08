<?php

use Core\Response;
use Core\Session;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}


function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require basePath("views/{$code}.php");

    die();
}

function isAuthorized($condition, $status = Response::NOT_AUTHORIZED)
{
    if (!$condition) {
        abort($status);
    }
}

function basePath($path)    //  Function to start a path from root dir
{
    return BASE_PATH . $path;
}

function view($path, $headerArray = [])     //  function for files in views dir
{
    extract($headerArray);      //  Converting an array key into variable which is being used in banner.php

    return basePath('views/' . $path);
}

function redirect($path)
{
    header("Location: $path");
    exit();
}

function old($key, $default = null)
{
    return Session::get('old')[$key] ?? $default;
}



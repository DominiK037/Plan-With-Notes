<?php

session_start();

use Core\Router;
use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . '/../';      //  __DIR__ -> current directory & /../ -> move one directory above in this case i.e to demo

require BASE_PATH . "vendor/autoload.php";

require BASE_PATH . "Core/functions.php";

require basePath("bootstrap.php");

$router = new Router();
$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];  //  The parse_url() function is used to parse an URL string into parts, such as the scheme, host, path, query string, and fragment
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->getErrors());
    Session::flash('old', $exception->getOld());

    return redirect($router->previousUrl());
}

Session::unflash();


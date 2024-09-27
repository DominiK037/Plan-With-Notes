<?php


use Core\Router;

const BASE_PATH = __DIR__ . '/../';      //  __DIR__ -> current directory & /../ -> move one directory above in this case i.e to demo

session_start();

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {

    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require basePath("{$class}.php");
});

require view("bootstrap.php");

$router = new Router();
$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];  //  The parse_url() function is used to parse an URL string into parts, such as the scheme, host, path, query string, and fragment
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
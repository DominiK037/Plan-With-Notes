<?php


function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require basePath($routes[$uri]);
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require basePath("views/{$code}.php");
    die();
}

$routes = require basePath('routes.php');
//      The parse_url() function is used to parse a URL string into its component parts,
//      such as the scheme, host, path, query string, and fragment
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);
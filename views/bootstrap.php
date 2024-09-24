<?php

use Core\Database;
use Core\Container;
use Core\App;

$container = new Container();
$keyAsPath = 'Core\Database';

$container->bind($keyAsPath, function (){     //  pathAsKey -> identifier/key, function-> building an object
    $config = require basePath('config.php');
    return new Database($config['database']);       //  we are returning the $dsn string
});

App::setContainer($container);     //  Saving an object into the container
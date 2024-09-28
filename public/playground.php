<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$number = new Collection([
    'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight',
]);

if ($number-> contains('five')){
    die('exists');
}
<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$env = json_decode(file_get_contents('env.json'), true);

$capsule->addConnection([
    'driver'    => $env['DB_DRIVER'],
    'host'      => $env['DB_HOST'],
    'database'  => $env['DB_NAME'],
    'username'  => $env['DB_USERNAME'],
    'password'  => $env['DB_PASSWORD'],
    'charset'   => $env['DB_CHARSET'],
    'collation' => $env['DB_COLLATION'],
    'prefix'    => $env['DB_PREFIX'],
]);

// Make this Capsule instance available globally via static methods
$capsule->setAsGlobal();

// Setup the Eloquent ORM
$capsule->bootEloquent();
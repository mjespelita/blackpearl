<?php

require_once __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

// Initialize Eloquent ORM
$capsule = new Capsule;

// Configure the database connection
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'blackpearl',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the Capsule instance globally (optional)
$capsule->setAsGlobal();

// Boot Eloquent ORM (optional if you want to use Eloquent models)
$capsule->bootEloquent();

// Define your migration using schema builder
Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});
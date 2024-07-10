<?php

require 'config/database.php';

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

// Initialize Eloquent ORM
$capsule = new Capsule;

// Define migration using schema builder
Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});

// password resets table
Capsule::schema()->create('password_resets', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('userid');
    $table->integer('token')->unique();
    $table->timestamps();
});
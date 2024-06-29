<?php

// models/User.php
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    // Optional: Specify the table if it's not the plural form of the model name
    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password'];
}
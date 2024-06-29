<?php

// src/Controller/HelloController.php

namespace App\Controller;

use Framework\BlackPearl\BlackPearl;
use Illuminate\Support\Facades\Request;
use User;

class HelloController
{
    public function greet()
    {
        require 'bootstrap.php';
        require 'model/User.php';
        require 'BlackPearl.php';

        // return BlackPearl::render('home', []);
        return User::all();
    }

    public function req(Request $request)
    {

    }
}
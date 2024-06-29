<?php

// src/Controller/HelloController.php

namespace App\Controller;

use Framework\BlackPearl\BlackPearl;
use User;

class HelloController
{
    public function greet()
    {
        require 'boostrap.php';
        require 'model/User.php';
        require 'BlackPearl.php';

        return BlackPearl::render('home', []);
    }
}
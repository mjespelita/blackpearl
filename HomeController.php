<?php

// src/Controller/HelloController.php

namespace App\Controller;

use User;

class HelloController
{
    public function greet()
    {
        require 'boostrap.php';
        require 'model/User.php';

        return "Hello";
    }
}
<?php

// src/Controller/HelloController.php

namespace App\Controller;

use Framework\BlackPearl\BlackPearl;
use Symfony\Component\HttpFoundation\Request;
use User;

class HelloController
{
    public function greet()
    {
        require 'bootstrap.php';
        require 'model/User.php';
        require 'BlackPearl.php';

        return BlackPearl::render('home', []);
    }

    public function data(Request $request)
    {
        // Example: Retrieve input data from request
        $name = $request->get('data');
        
        // Example: Process data (replace with your application logic)
        $message = "Hello, $name!";
        
        // Example: Return JSON response
        return header("Location: /");
    }
}
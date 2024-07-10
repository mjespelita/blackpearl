<?php

namespace App\Controller;

use Framework\BlackPearl\View;

class HomeController
{
    public function index()
    {
        /**
         * Uncomment Auth::check() to enable user authentication
         * and integrate it into your controllers for secure access
         * control and enhanced application security.
         */
        
        // Auth::check();

        return View::render('home', []);
    }
}
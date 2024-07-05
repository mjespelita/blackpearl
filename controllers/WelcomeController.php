<?php

namespace App\Controller;

use Framework\BlackPearl\View;

class WelcomeController
{
    public function index()
    {
        return View::render('welcome', []);
    }
}
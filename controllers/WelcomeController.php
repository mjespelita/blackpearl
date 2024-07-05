<?php

namespace App\Controller;

use Framework\BlackPearl\View;
use Framework\BlackPearl\WithUrl;

class WelcomeController
{
    public function index()
    {
        return View::render('welcome', []);
    }
}
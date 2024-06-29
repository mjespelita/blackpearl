<?php

namespace App\Controller;

use Framework\BlackPearl\View;

class HomeController
{
    public function index()
    {
        return View::render('home', []);
    }
}
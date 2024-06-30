<?php

namespace App\Controller;

use Framework\BlackPearl\Auth;
use Framework\BlackPearl\View;

class HomeController
{
    public function index()
    {
        Auth::check();

        return View::render('welcome', []);
    }
}
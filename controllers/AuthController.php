<?php

namespace App\Controller;

use Framework\BlackPearl\Auth;
use Framework\BlackPearl\Redirect;
use Framework\BlackPearl\View;
use Symfony\Component\HttpFoundation\Request;

class AuthController
{
    public function register()
    {
        return View::render('register', []);
    }

    public function login()
    {
        return View::render('login', []);
    }

    public function registerProcess(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        $hashedPassword = password_hash($password, null);

        if (Auth::register($name, $email, $hashedPassword)) {
            return Redirect::to('/');
        } else {
            return "Email already exist.";
        }
    }

    public function loginProcess(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        if (Auth::login($email, $password)) {
            return Redirect::to('/');
        } else {
            return "Incorrect email or password.";
        }
    }

    public function logout()
    {
        return Auth::logout();
    }
}
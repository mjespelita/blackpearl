<?php

use App\Routing\Routes;

return Routes::load(function($route) {
    $route->add('welcome', '/', 'App\Controller\WelcomeController::index');
    $route->add('home', '/home', 'App\Controller\HomeController::index');

    // Authentication Routes
    $route->add('login', '/login', 'App\Controller\AuthController::login');
    $route->add('logout', '/logout', 'App\Controller\AuthController::logout');
    $route->add('register', '/register', 'App\Controller\AuthController::register');
    $route->add('login-process', '/login-process', 'App\Controller\AuthController::loginProcess');
    $route->add('register-process', '/register-process', 'App\Controller\AuthController::registerProcess');
});
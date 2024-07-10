<?php

use App\Controller\AuthController;
use App\Controller\HomeController;
use App\Controller\WelcomeController;
use App\Routing\Routes;


return Routes::load(function($route) {
    $route->add('welcome', '/', [WelcomeController::class, 'index']);
    $route->add('home', '/home', [HomeController::class, 'index']);

    // Auth Routes
    $route->add('login', '/login', [AuthController::class, 'login']);
    $route->add('logout', '/logout', [AuthController::class, 'logout']);
    $route->add('register', '/register', [AuthController::class, 'register']);
    $route->add('login-process', '/login-process', [AuthController::class, 'loginProcess']);
    $route->add('register-process', '/register-process', [AuthController::class, 'registerProcess']);
});
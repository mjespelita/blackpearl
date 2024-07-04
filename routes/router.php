<?php

require '_blackpearl/autoload.php';

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$Routes = new RouteCollection();

// Define you route and controller

$Routes->add('welcome', new Route('/', [
    '_controller' => 'App\Controller\WelcomeController::index',
]));

$Routes->add('home', new Route('/home', [
    '_controller' => 'App\Controller\HomeController::index',
]));


// Authentication Routes

$Routes->add('register', new Route('/register', [
    '_controller' => 'App\Controller\AuthController::register',
]));

$Routes->add('login', new Route('/login', [
    '_controller' => 'App\Controller\AuthController::login',
]));

$Routes->add('logout', new Route('/logout', [
    '_controller' => 'App\Controller\AuthController::logout',
]));

$Routes->add('register-process', new Route('/register-process', [
    '_controller' => 'App\Controller\AuthController::registerProcess',
]));

$Routes->add('login-process', new Route('/login-process', [
    '_controller' => 'App\Controller\AuthController::loginProcess',
]));

return $Routes;
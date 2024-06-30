<?php

require '_blackpearl/autoload.php';

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

// Define you route and controller

$routes->add('welcome', new Route('/', [
    '_controller' => 'App\Controller\WelcomeController::index',
]));

$routes->add('home', new Route('/home', [
    '_controller' => 'App\Controller\HomeController::index',
]));



// Auth Routes

$routes->add('register', new Route('/register', [
    '_controller' => 'App\Controller\AuthController::register',
]));

$routes->add('login', new Route('/login', [
    '_controller' => 'App\Controller\AuthController::login',
]));

$routes->add('logout', new Route('/logout', [
    '_controller' => 'App\Controller\AuthController::logout',
]));

$routes->add('register-process', new Route('/register-process', [
    '_controller' => 'App\Controller\AuthController::registerProcess',
]));

$routes->add('login-process', new Route('/login-process', [
    '_controller' => 'App\Controller\AuthController::loginProcess',
]));

return $routes;
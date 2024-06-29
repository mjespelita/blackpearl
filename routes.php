<?php

// routes.php

require './HomeController.php';

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

// Define your routes
$routes->add('homepage', new Route('/', [
    '_controller' => 'App\Controller\HelloController::greet',
]));

$routes->add('data', new Route('/data', [
    '_controller' => 'App\Controller\HelloController::data',
]));

// Optionally, add more routes as needed
// $routes->add(...);

return $routes;
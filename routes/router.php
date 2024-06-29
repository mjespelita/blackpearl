<?php

require '_blackpearl/autoload.php';

use Framework\BlackPearl\Web;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

// Define route and controller

$routes->add('home', new Route('/', [
    '_controller' => 'App\Controller\HomeController::index',
]));

$routes->add('about', new Route('/about', [
    '_controller' => 'App\Controller\AboutController::index',
]));

return $routes;
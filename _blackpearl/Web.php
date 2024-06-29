<?php

namespace Framework\BlackPearl;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Web
{
    public static $routes;
    public static function route($route, $controller)
    {
        self::$routes = new RouteCollection();
        // Define route and controller
        self::$routes->add('', new Route($route, [
            '_controller' => $controller,
        ]));
    }
}
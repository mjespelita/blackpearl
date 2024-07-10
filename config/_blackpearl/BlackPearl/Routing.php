<?php

// Routing.php

namespace App\Routing;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Routes
{
    protected $routes;

    public function __construct()
    {
        $this->routes = new RouteCollection();
    }

    public static function load(callable $callback): RouteCollection
    {
        $instance = new static();
        $callback($instance);
        return $instance->routes;
    }

    public function add(string $name, string $path, array $controller): self
    {
        $this->routes->add($name, new Route($path, [
            '_controller' => $controller,
        ]));
        return $this;
    }
}
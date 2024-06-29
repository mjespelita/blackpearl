<?php

// index.php

require_once __DIR__ . '/vendor/autoload.php';
$routes = require_once __DIR__ . '/routes.php'; // Include your routes configuration

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

// Create a request context
$requestContext = new RequestContext();
$requestContext->fromRequest(Request::createFromGlobals());

// Initialize the UrlMatcher with the route collection and request context
$matcher = new UrlMatcher($routes, $requestContext);

// Initialize the ControllerResolver and ArgumentResolver
$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

// Match the current request
try {
    $parameters = $matcher->match($requestContext->getPathInfo());
    // The _controller key holds the controller or callback to handle the request
    $request = Request::createFromGlobals();
    $request->attributes->add($parameters);
    // Resolve the controller
    $controller = $controllerResolver->getController($request);
    // Resolve the arguments
    $arguments = $argumentResolver->getArguments($request, $controller);
    // Call the controller
    echo call_user_func_array($controller, $arguments);
} catch (ResourceNotFoundException $e) {
    // Handle 404 Not Found
    echo '404 Not Found: ' . $e->getMessage();
} catch (Exception $e) {
    // Handle other errors
    echo 'An error occurred: ' . $e->getMessage();
}
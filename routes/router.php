<?php

require '_blackpearl/autoload.php';

use Framework\BlackPearl\Web;

Web::route('/', 'App\Controller\HomeController::index');

return Web::$routes;
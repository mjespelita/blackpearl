<?php

use Symfony\Component\Console\Application;

require 'config/autoload.php';

require './config/_blackpearl/Commands/Controller.php';
require './config/_blackpearl/Commands/View.php';
require './config/_blackpearl/Commands/Model.php';
require './config/_blackpearl/Commands/Database.php';
require './config/_blackpearl/Commands/Console.php';
require './config/_blackpearl/Commands/Middleware.php';
require './config/_blackpearl/Commands/Policy.php';


$application = new Application();
$application->add(new MakeController());
$application->add(new MakeView());
$application->add(new MakeModel());
$application->add(new Database());
$application->add(new BlackPearlConsole());
$application->add(new MakeMiddleware());
$application->add(new MakePolicy());
$application->run();
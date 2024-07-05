<?php

use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

require '_blackpearl/Commands/Controller.php';
require '_blackpearl/Commands/View.php';
require '_blackpearl/Commands/Model.php';
require '_blackpearl/Commands/Database.php';


$application = new Application();
$application->add(new MakeController());
$application->add(new MakeView());
$application->add(new MakeModel());
$application->add(new Database());
$application->run();
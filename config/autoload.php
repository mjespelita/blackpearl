<?php

require './config/database.php';
require './config/_blackpearl/BlackPearl/View.php';
require './config/_blackpearl/BlackPearl/File.php';
require './config/_blackpearl/BlackPearl/Mail.php';
require './config/_blackpearl/BlackPearl/BarCode.php';
require './config/_blackpearl/BlackPearl/QRCode.php';
require './config/_blackpearl/BlackPearl/JSON.php';
require './config/_blackpearl/BlackPearl/Excel.php';
require './config/_blackpearl/BlackPearl/Math.php';
require './config/_blackpearl/BlackPearl/WithUrl.php';
require './config/_blackpearl/BlackPearl/Redirect.php';
require './config/_blackpearl/BlackPearl/Auth.php';
require './config/_blackpearl/BlackPearl/Routing.php';
require './config/_blackpearl/BlackPearl/API.php';

// Models
require './models/User.php';

// Controllers
require './controllers/HomeController.php';

// Additionals
require './controllers/AuthController.php';
require './controllers/WelcomeController.php';
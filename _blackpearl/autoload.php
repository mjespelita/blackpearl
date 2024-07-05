<?php

require './config/app.php';

require './_blackpearl/BlackPearl/View.php';
require './_blackpearl/BlackPearl/File.php';
require './_blackpearl/BlackPearl/Mail.php';
require './_blackpearl/BlackPearl/BarCode.php';
require './_blackpearl/BlackPearl/QRCode.php';
require './_blackpearl/BlackPearl/JSON.php';
require './_blackpearl/BlackPearl/Excel.php';
require './_blackpearl/BlackPearl/Math.php';
require './_blackpearl/BlackPearl/WithUrl.php';
require './_blackpearl/BlackPearl/Redirect.php';
require './_blackpearl/BlackPearl/Auth.php';
require './_blackpearl/BlackPearl/Routing.php';

// Models
require './models/User.php';

// Controllers
require './controllers/HomeController.php';

// Additionals
require './controllers/AuthController.php';
require './controllers/WelcomeController.php';
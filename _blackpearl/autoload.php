<?php

require './config/app.php';

require './_blackpearl/View.php';
require './_blackpearl/File.php';
require './_blackpearl/Mail.php';
require './_blackpearl/BarCode.php';
require './_blackpearl/QRCode.php';
require './_blackpearl/JSON.php';
require './_blackpearl/Excel.php';
require './_blackpearl/Math.php';
require './_blackpearl/WithUrl.php';
require './_blackpearl/Redirect.php';
require './_blackpearl/Web.php';

// Models
require './models/User.php';

// Controllers
require './controllers/HomeController.php';

// Additionals
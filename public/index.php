<?php
// All file paths relative to root
chdir(dirname(__DIR__));

require 'vendor/autoload.php';
session_start();

//simulate customer login
$_SESSION['customer_id'] = 1;


use Noodlehaus\Config;
$conf = Config::load('app/boot/settings.yaml');
$settings = $conf->get('settings', []);

// Instantiate Slim
$app = new \Slim\App(['settings'=>$settings]);


//require 'app/model/AuthService.php';
require 'app/model/PlacesService.php';

require 'app/boot/dependencies.php';
require 'app/boot/middleware.php';

// Register the routes
require 'app/src/routes.php';

$app->run();
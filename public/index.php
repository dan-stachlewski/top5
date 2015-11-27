<?php
// All file paths relative to root
chdir(dirname(__DIR__));

//Require the SLIM V 3.0 FRAMEWORK - *** without below require nothing happens***
require 'vendor/autoload.php';
session_start();

// Simulate Customer Login *** @ the beginning so we can RETRIEVE & DISPLAY places ***
$_SESSION['customer_id'] = 1;


use Noodlehaus\Config;
$configuration = Config::load('app/boot/settings.yaml');
$settings = $configuration->get('settings', []);

// Instantiate the SLIM V 3.0 FRAMEWORK
$app = new \Slim\App(['settings'=>$settings]);


//require 'app/model/AuthService.php';
require 'app/model/PlacesService.php';

require 'app/boot/dependencies.php';
require 'app/boot/middleware.php';

// Register the routes
require 'app/src/routes.php';

// Required to RUN the application *** ALWAYS @ END of the FILE ***
$app->run();
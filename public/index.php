<?php
/* ==== index.php is now the FRONT CONTROLLER = jumping off point for all the traffic entering the site  ==== */
/* ==== All REQUESTS & RESPONSES are DIRECTED thru the index.php file where:
 *  they will eventually move to CONTROLLERS, 
 * serve up VIEW code, 
 * make updates to the dBase  
 * index.php is the 1st step for the entire app & Slim Framework is used to achieve this
 * ==== */

// All file paths relative to root
chdir(dirname(__DIR__));

//Require the SLIM V 3.0 FRAMEWORK - *** without below require nothing happens***
require 'vendor/autoload.php';
session_start();

// Simulate Customer Login *** @ the beginning so we can RETRIEVE & DISPLAY places ***
//$_SESSION['customer_id'] = 1;

/* ==== EXAMPLE OF [NAMESPACING] use Noodlehaus\Config to shorten the code to make it look neater   ==== */
/* ==== [NAMESPACING] used to reduce conflics of variables and classes using the same names in the dependencies libraries   ==== */
use Noodlehaus\Config;

$configuration = Config::load('app/boot/settings.yaml');
$settings = $configuration->get('settings', []);

// Instantiate the SLIM V 3.0 FRAMEWORK
//New instance of Slim in the $app vaiable
$app = new \Slim\App(['settings'=>$settings]);


//require 'app/model/AuthService.php';
require 'app/model/PlacesService.php';
require 'app/model/CustomerService.php';

require 'app/boot/dependencies.php';
require 'app/boot/middleware.php';

// Register the routes
require 'app/src/routes.php';

// Required to RUN the application *** ALWAYS @ END of the FILE ***
$app->run();
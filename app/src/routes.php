<?php

/*
 * Set up global data for the website templates, 
 * so it is available for ecery route.
 * It uses TWIG Environment object 
 */

//get TWIG env object
//$twig = $app->view->getEnvironment();
//Set the table of content for the left navbar
//$twig->addGlobal('docs', $app->toc);

//Is the user logged?
//$twig->addGlobal('userLogged', isset($_SESSION['user_id']));
//is the user administrator?
//$twig->addGlobal('isAdministrator', isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'ADMIN');

//require 'app/src/FormsValidation.php';

require 'app/src/placesRoutes.php';

$app->get('/', function ($request, $response, $args) {
    return $response->write("HELLO top5");
})->setName('home');

$app->get('/test', function ($request, $response, $args) {
    $this->view->render($response, 'navbar.twig', [
        'home' => $this->toc
    ]);
});

$app->get('/home/{slug}', function ($request, $response, $args) {
    echo "You selected {$args['slug']}";
});


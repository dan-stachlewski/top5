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

require 'app/src/homeRoutes.php';
require 'app/src/placesRoutes.php';

/* ============ ROUTE FOR HOMEPAGE A LOGIN ============ */
/***
 * Step 1 - add the $app->get(...);
 * Step 2 - create the template for the render
 * Step 3 - Makse sure the 'page_content' exists in the template like  {{ page_content|raw }}
 *** NOTE *** I wanted to generate links that would take the user to each of the categories and show all for that category however Janusz said this should be for PART B All I need is a login screen for Part A
 */
$app->get('/', function ($request, $response, $args) {
    

    $tags = $this->places->getTags();    
    
    
    $this->view->render($response, '/home/part-a/homepage_structure.twig', [
        //'place' => $place,
        //'tags' => $tags,//'docs' => $this->toc,
        //'flash_messages' => $flash_messages,
       // 'userLogged' => isset($_SESSION['user_id']),
        'page_content' => "<h1>Welcome to the Top 5 website.</h1>",
    ]);

})->setName('homepage_a');

/* ============ ROUTE FOR HOMEPAGE B LINKS TO DATA BASED ON CATEGORY ============ */
/***
 * Step 1 - add the $app->get(...);
 * Step 2 - create the template for the render
 * Step 3 - Makse sure the 'page_content' exists in the template like  {{ page_content|raw }}
 *** NOTE *** I wanted to generate links that would take the user to each of the categories and show all for that category however Janusz said this should be for PART B All I need is a login screen for Part A
 */
$app->get('/client', function ($request, $response, $args) {
    

    $tags = $this->places->getTags();    
    
    
    $this->view->render($response, '/home/part-b/homepage_structure.twig', [
        //'place' => $place,
        'tags' => $tags,//'docs' => $this->toc,
        //'flash_messages' => $flash_messages,
       // 'userLogged' => isset($_SESSION['user_id']),
        'page_content' => "<h1>Welcome to the Top 5 website.</h1>",
    ]);

})->setName('homepage_b');

$app->get('/test', function ($request, $response, $args) {
    $this->view->render($response, 'navbar.twig', [
        'home' => $this->toc
    ]);
});

$app->get('/home/{slug}', function ($request, $response, $args) {
    echo "You selected {$args['slug']}";
});


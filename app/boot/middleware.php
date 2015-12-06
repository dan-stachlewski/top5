<?php
//syntax to add middleware
$app->add(new \Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware());

/***
 * Add the Middleware at the end as it Controls the pages and who has access to them
 */

$app->add(function ($request, $response, $next) use ($app) {
    //look at uri $ request
    $uri = $request->getUri(); //request object - ie do i want to login
    $path = $uri->getPath();


    //allow free passage through unprotected paths
    //routes that don't need login
    //b/c small # paths use switch stmnt instead of array below
    //applied before entering the route
    switch ($path) {
        case $app->router->pathFor('login'):
        case $app->router->pathFor('logout'):
        case $app->router->pathFor('register'):
        //case $app->router->pathFor('docs-home'): //start from
        case $app->router->pathFor('home'): //root
            return $next($request, $response); //do not interfere allow passage
            break;
    }
    
    //what does it mean someone is logged in?
    //is the user logged
    //user_id defines the person logged in
    if (!isset($_SESSION['customer_id'])) {
        $app->flash->addMessage('danger', 'Please Login First');//set up flash msg
        return $response->withRedirect($app->router->pathFor('login'));//redirect to login if session not set
    }
    
    //OK, ready to go
    return $next($request, $response); //ready to go and do what you need to do once logged in
});



//$app->add($app->csrf);
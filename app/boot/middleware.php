<?php
//syntax to add middleware
$app->add(new \Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware());


$app->add(function ($request, $response, $next) use ($app) {
    //look at uri $ request
    $uri = $request->getUri(); //request object - ie do i want to login
    $path = $uri->getPath();
    /*
    if (strlen($uri->getBasePath()) > 0) {
        if ($path === '/')
            $path = $uri->getBasePath() . '/';
        else {
            $path = $uri->getBasePath() . '/' . $path;
        }
    }
    */
    
    //allow free passage through unprotected paths
    //routes that don't need login
    //b/c small # paths use switch stmnt instead of array below
    //applied before entering the route
    switch ($path) {
        case $app->router->pathFor('login'):
        case $app->router->pathFor('register'):
        case $app->router->pathFor('docs-home'): //start from
        case $app->router->pathFor('home'): //root
            return $next($request, $response); //do not interfere allow passage
            break;
    }

    /* this has to do with running from dev once live then this is not needed
     * the same as above, but array based
      $open_paths = [
      $app->router->pathFor('login'),
      $app->router->pathFor('register'),
      $app->router->pathFor('docs-home'),
      $app->router->pathFor('home'),
      ];

      if (array_search($path, $open_paths) !== false) {
      return $next($request, $response);
      }
     */
    
    //what does it mean someone is logged in?
    //is the user logged
    //user_id defines the person logged in
    if (!isset($_SESSION['user_id'])) {
        $app->flash->addMessage('danger', 'Please login first');//set up flash msg
        return $response->withRedirect($app->router->pathFor('login'));//redirect to login if session not set
    }

    //OK, ready to go
    return $next($request, $response); //ready to go and do what you need to do once logged in
});



//INVALID CSRF handler
$app->add(function ($request, $response, $next) use ($app) {
    if ($request->getAttribute('csrf_status') === false) {
        $error_msg = "Something went terribly wrong OR  your form  was already processed";
        $c = $app->getContainer();
        return $c['view']->render($response, 'errors/500.twig', [
                            'docs' => $c['toc'],
                            'message' => $error_msg
                        ])
                        ->withStatus(500)
                        ->withHeader('Content-Type', 'text/html');
    }
    return $next($request, $response);
});

/* before sends adds something to it.... email w disclaimer....
 * important otherwise would have to protect every route time consuming
  //Adds CSRF automaticallty to your form
  $app->add(function ($request, Response $response, $next) use ($app) {

//this example passing the ball
  $response = $next($request, $response);

  $str_body = (string)$response->getBody();
  //check for forms, othwerwise ignore
  if (strpos($str_body, '</form>') === false) {
  return $response;
  }

  //at least one form exists
  //define replacement for every </form> element

  $withCSRF = <<<MSG
  <input type="hidden" name="csrf_name" value="{$request->getAttribute('csrf_name')}">
  <input type="hidden" name="csrf_value" value="{$request->getAttribute('csrf_value')}">
  </form>
  MSG;

  $new_str_body = str_replace('</form>', $withCSRF, $str_body);
  //overwrites  response body entirely
  $body = new \Slim\Http\Body(fopen('php://temp', 'r+'));
  $body->write($new_str_body);

 //then waits for the ball to reach you once the routes have worked
  return $response->withBody($body);
  });

 */


$app->add($app->csrf);
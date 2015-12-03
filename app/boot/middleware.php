<?php
//syntax to add middleware
$app->add(new \Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware());

/***
 * Add the Middleware at the end as it Controls the pages and who has access to them
 */

//$app->add($app->csrf);
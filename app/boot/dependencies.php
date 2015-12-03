<?php
// Defines the CONTAINER requested in the MODEL files
$container = $app->getContainer();

// Set Up the TWIG VIEW
//$configuration comes from index.php and uses the YAMEL file for SETTINGS
$container['view'] = function ($c) use($configuration) {
    $twig = $configuration->get('view.twig');
    $template_path = $configuration->get('view.template_path');

    $view = new \Slim\Views\Twig($template_path, $twig);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $c['request']->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

//set up CSRF
$container['csrf'] = function ($c) {
    $guard = new \Slim\Csrf\Guard();
    //called in case of failure
    $guard->setFailureCallable(function ($request, $response, $next) {
        $request = $request->withAttribute("csrf_status", false);
        return $next($request, $response);
    });
    return $guard;
};

// Flash messages
$container['flash'] = function ($c) {
    return new \Slim\Flash\Messages();
};

$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['view']->render($response, 'errors/404.twig')
                        ->withStatus(404)
                        ->withHeader('Content-Type', 'text/html');
    };
};


$c['errorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {
        return $c['view']->render($response, 'errors/500.twig', ['message' => $exception->getMessage()])
                        ->withStatus(500)
                        ->withHeader('Content-Type', 'text/html');
    };
};

$container['db'] = function ($c) use($configuration, $app) {
    $db = $configuration->get('db');

    //if (!$db) return null;
    if ($db['driver'] == 'mysql') {
        $dsn = "mysql:host={$db['host']};dbname={$db['dbname']}";
        $username = $db['username'];
        $password = $db['password'];
        try {
            $pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            throw $e;
        }
        return $pdo;
    }
    return null;
};


$container['places'] = function ($c) {
    return new PlacesService($c['db']);
};

//anything application specific can be preserved
$container['application'] = function ($c) use($conf) {
    return $conf->get('application');
};
//set up markdown processor
$container['md_parser'] = function ($c) {
    $parser = new Parsedown();
    return $parser;
};

//toc - all documents and slugs
use Noodlehaus\Config;

$container['toc'] = function($c) {
    $dir_name = $c['application']['docs_path'];
    $index_file_name = $c['application']['docs_index_file'];
    $indexFile = "{$dir_name}/{$index_file_name}";
    $toc = Config::load($indexFile)->get('toc');
    return $toc;
};


/*
$container['auth'] = function ($c) {
    return new AuthService($c['db']);
};
*/

/*
Illuminate setup

use Illuminate\Database\Capsule\Manager as DB;

$capsule = new DB();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'slimdocs',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

 */


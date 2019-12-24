<?php

require_once 'config.php';
require_once 'autoloader.php';
require_once 'classes/Dumper/dumper.php';

// $obj = new Controllers\FilmController;
// dd('hey', ['coucou', 'voilà', ['le', 'sous', 'tableau', 'marche', 'parfaitement', '!!!']], 1.1, $obj);


dd([
    '/' => 'App::index',
    '/films' => [
        '/' => 'App::list',
        '/#int' => 'App::show',
        '/delete' => [
            '/#int' => 'App::delete'
        ],
        '/create' => 'App::create'
    ]
]);

$routeMatcher = new Routing\RouteMatcher;
$routeInfo = $routeMatcher->resolve();

$controller = $routeInfo['controller'];
$method = $routeInfo['method'];
$arguments = $routeInfo['parameters'];

$reflectionMethod = new ReflectionMethod($controller, $method);
$response = $reflectionMethod->invokeArgs(new $controller, $arguments);

echo $response;
die;

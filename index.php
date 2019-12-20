<?php

require_once 'config.php';
require_once 'autoloader.php';
require_once 'Dumper/dumper.php';

$obj = new Controllers\FilmController;
dd('hey', ['coucou', 'voilà', ['le', 'sous', 'tableau', 'marche', 'parfaitement', '!!!']], 1, $obj);
// $controller = new Controllers\FilmController;
// $reflection = new ReflectionClass($controller);
// $methods = $reflection->getMethods();
// $properties = $reflection->getProperties();
// $comment = $reflection->getDocComment();

// dd($reflection, $methods, $properties, $comment);

// exit;

$routeMatcher = new Routing\RouteMatcher;
$controller_callable = $routeMatcher->resolve()['callable'];
// dd($controller_callable);
$controller = new $controller_callable[0];

$response = $controller->{$controller_callable[1]}();

header('Content-Type: application/json');
die(json_encode($response));

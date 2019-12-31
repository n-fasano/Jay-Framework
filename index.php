<?php

require_once 'config.php';
require_once 'autoloader.php';
require_once 'classes/Dumper/include_me.php';

$db = new ORM\ORM;
dd($db->getDatabases());

$routeMatcher = new HTTP\RouteMatcher;
$routeInfo = $routeMatcher->resolve($_SERVER['REQUEST_URI']);

$controller = $routeInfo['controller'];
$method = $routeInfo['method'];
$arguments = $routeInfo['parameters'];

$reflectionMethod = new ReflectionMethod($controller, $method);
$response = $reflectionMethod->invokeArgs(new $controller, $arguments);

echo $response;
die;

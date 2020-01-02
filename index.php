<?php

require_once 'config.php';
require_once 'autoloader.php';
require_once 'classes/Dumper/include_me.php';



// $db = new ORM\ORM;
// $tables = $db->getTables('cv');
// foreach ($tables as $table)
// {
//     Writers\ClassWriter::createFromTable($table, $db, 'cv');
// }
// $dbName = 'cv';
// $tables = $db->getTables($dbName);
// $columns = $db->getColumns($dbName, 'task');

function findLinks(array $columns, ORM\ORM $db)
{
    foreach ($columns as $column) 
    {
        $name = $column->getColumnName();
        if ($index = strpos($name, '_id'))
        {
            $linked = $db->getColumns('cv', substr($name, 0, $index));
            if ($linked) {
                dump($linked);
                findLinks($linked, $db);
            }
        }
    }
}

// findLinks($columns, $db);
// die;

$routeMatcher = new HTTP\RouteMatcher;
$routeInfo = $routeMatcher->resolve($_SERVER['REQUEST_URI']);

$controller = $routeInfo['controller'];
$method = $routeInfo['method'];
$arguments = $routeInfo['parameters'];

$reflectionMethod = new ReflectionMethod($controller, $method);
$response = $reflectionMethod->invokeArgs(new $controller, $arguments);

echo $response;
die;

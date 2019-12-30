<?php

class Container
{
    static private $objects = [];

    static public function get(string $className)
    {
        if(!isset(self::$objects[$className])) {
            self::$objects[$className] = new $className;
        }

        return self::$objects[$className];
    }
}
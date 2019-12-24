<?php

namespace ORM;

class Writer
{
    public function __construct()
    {
    }

    public function write()
    {
    }
}

$line = trim(fgets(STDIN));
fscanf(STDIN, "%d\n", $number);
var_dump($argc, $argv, $line, $number);

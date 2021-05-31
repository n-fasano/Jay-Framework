<?php

require_once 'config.php';
require_once 'autoloader.php';

if (!isset($argv[1]))
{
    Writers\ClassWriter::commands();
    die;
}

switch ($argv[1]) 
{
    case 'write:class':
        Writers\ClassWriter::write($argv[2] ?? null);
        break;
    case 'cache:clear':
        $directory = new RecursiveDirectoryIterator(CACHE_DIR);
        $iterator = new RecursiveIteratorIterator($directory);

        foreach ($iterator as $info) {
            if ($info->isFile()) {
                $filename = $info->getFilename();
                if ($filename[0] !== '.') {
                    unlink(CACHE_DIR . '/' . $filename);
                }
            }
        }
        break;
    default:
        echo 'USAGE: php ./console.php write:class [classname]' . PHP_EOL;
        echo 'USAGE: php ./console.php cache:clear' . PHP_EOL;
        break;
}

die;
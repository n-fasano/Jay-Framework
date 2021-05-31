<?php

spl_autoload_register(function ($classname) {
    $classPath = CLASSES_DIR . '/' . str_replace('\\', '/', $classname) . '.php';
    if (!is_file($classPath)) {
        return;
    }
    require_once $classPath;
});

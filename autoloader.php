<?php

spl_autoload_register(function ($classname) {
    if (!is_file(CLASSES_DIR . '/' . $classname . '.php')) {
        return;
    }
    require_once CLASSES_DIR . '/' . $classname . '.php';
});

<?php

spl_autoload_register(function ($classname) {
    require_once CLASSES_DIR . '/' . $classname . '.php';
});

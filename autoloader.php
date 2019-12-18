<?php

spl_autoload_register(function ($classname) {
    require_once $classname . '.php';
});

<?php

function dump()
{
    $vars = func_get_args();
    echo '<div class="dumpster-wrapper">';
    echo '<ul class="dumpster">';
    foreach ($vars as $var) {
        real_dump($var);
    }
    echo '</ul>';
    echo '</div>';
    include_once 'templates/dumper.css.html';
    include_once 'templates/dumper.js.html';
}

function dd()
{
    $vars = func_get_args();
    echo '<div class="dumpster-wrapper">';
    file_info();
    echo '<ul class="dumpster">';
    foreach ($vars as $var) {
        real_dump($var);
    }
    echo '</ul>';
    echo '</div>';
    include_once 'templates/dumper.css.html';
    include_once 'templates/dumper.js.html';
    die;
}

function real_dump($var, int $depth = 0)
{
    $type = substr(gettype($var), 0, 3);
    if ($type === 'arr' && $depth < 5) {
        real_dump_array($var, $depth);
    } else if ($type === 'obj') {
        real_dump_obj($var, $depth);
    } else {
        echo "<li><span class='dump-type $type'>($type)</span> $var</li>";
    }
}

function real_dump_array(array $array, int $depth)
{
    $count = count($array);
    if ($depth < 5) {
        echo "
            <li class='dump'>
                <span class='dump-type arr'>[array]</span> ($count)
                <ul class='dumpster'>
        ";
        foreach ($array as $key => $value) {
            real_dump($value, $depth + 1);
        }
        echo "
                </ul>
            </li>
        ";
    } else {
        echo "<li><span class='dump-type arr'>[array]</span> ($count)</li>";
    }
}

function real_dump_obj(object $obj, int $depth, string $propertyName = null)
{
    $class = get_class($obj);
    $properties = (new ReflectionClass($obj))->getProperties();
    if ($depth < 5) {
        echo "
            <li class='dump'>
                <span class='dump-type obj'>{obj}</span> $class
                <ul class='dumpster'>
        ";
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $name = $property->getName();
            $value = $property->getValue($obj);
            $type = substr(gettype($value), 0, 3);
            if ($type === 'arr') {
                $count = count($value);
                echo "<li>$name: <span class='dump-type arr'>[array]</span> ($count)</li>";
            } else if ($type === 'obj') {
                echo "<li>$name: <span class='dump-type obj'>{obj}</span> $class</li>";
            } else {
                echo "<li>$name: <span class='dump-type $type'>($type)</span> $value</li>";
            }
        }
        echo "
                </ul>
            </li>
        ";
    } else {
        echo "<li><span class='dump-type obj'>{obj}</span> $class</li>";
    }
}

function file_info()
{
    $backtrace = debug_backtrace();
    echo '<h4>' . $backtrace[1]['file'] . ' - Line ' . $backtrace[1]['line'] . '</h4>';
}

<?php

namespace Dumper;

class Dumper
{
    private static $maxDepth = 5;

    public static function dump()
    {
        $vars = func_get_args();
        include_once 'templates/dumper.css.html';
        echo '<div class="dumpster-wrapper">';
        echo '<ul class="dumpster">';
        foreach ($vars as $var) {
            self::real_dump($var);
        }
        echo '</ul>';
        echo '</div>';
        include_once 'templates/dumper.js.html';
    }

    public static function dd()
    {
        $vars = func_get_args();
        include_once 'templates/dumper.css.html';
        echo '<div class="dumpster-wrapper">';
        self::file_info();
        echo '<ul class="dumpster">';
        foreach ($vars as $var) {
            self::real_dump($var);
        }
        echo '</ul>';
        echo '</div>';
        include_once 'templates/dumper.js.html';
        die;
    }

    public static function setMaxDepth(int $maxDepth)
    {
        self::$maxDepth = $maxDepth;
    }

    private static function real_dump($var, int $depth = 0, string $propertyName = '')
    {
        $type = substr(gettype($var), 0, 3);
        if ($type === 'arr') {
            self::real_dump_array($var, $depth, $propertyName);
        } else if ($type === 'obj') {
            self::real_dump_obj($var, $depth, $propertyName);
        } else if ($type === 'boo') {
            $varStr = $var ? 'true' : 'false';
            echo "<li>$propertyName<span class='dump-type $type'>($type)</span> $varStr</li>";
        } else {
            echo "<li>$propertyName<span class='dump-type $type'>($type)</span> $var</li>";
        }
    }

    private static function real_dump_array(array $array, int $depth, string $propertyName = '')
    {
        $count = count($array);
        if ($depth < self::$maxDepth) {
            echo "
            <li class='dump'>
                $propertyName<h6><span class='dump-type arr'>[array]</span> ($count)</h6>
                <ul class='dumpster'>
        ";
            foreach ($array as $key => $value) {
                $type = substr(gettype($key), 0, 3);
                self::real_dump($value, $depth + 1, "<span class='dump-type $type'>($type)</span> " . $key . ' => ');
            }
            echo "
                </ul>
            </li>
        ";
        } else {
            echo "<li>$propertyName<span class='dump-type arr'>[array]</span> ($count)</li>";
        }
    }

    private static function real_dump_obj(object $obj, int $depth, string $propertyName = '')
    {
        $class = get_class($obj);
        $properties = (new \ReflectionClass($obj))->getProperties();
        if ($depth < self::$maxDepth) {
            echo "
            <li class='dump'>
                $propertyName<h6><span class='dump-type obj'>{obj}</span> $class</h6>
                <ul class='dumpster'>
        ";
            foreach ($properties as $property) {
                $modifiers = \Reflection::getModifierNames($property->getModifiers());
                $property->setAccessible(true);
                $name = $property->getName();
                $value = $property->getValue($obj);
                $modifiers[0] = self::getModifierSign($modifiers[0]);

                $propName = "$modifiers[0]$name: ";
                self::real_dump($value, $depth + 1, $propName);
            }
            echo "
                </ul>
            </li>
        ";
        } else {
            echo "<li>$propertyName<span class='dump-type obj'>{obj}</span> $class</li>";
        }
    }

    private static function file_info()
    {
        $backtrace = debug_backtrace();
        echo '<h4>' . $backtrace[1]['file'] . ' - Line ' . $backtrace[1]['line'] . '</h4>';
    }

    private static function getModifierSign(string $modifier)
    {
        return [
            'public' => '+',
            'protected' => '_',
            'private' => '#',
        ][$modifier];
    }
}

<?php

namespace Writers;

class ClassWriter
{
    static private $tabLength = 4;

    static public function write(string $classname)
    {
        if (!$classname) {
            echo 'Please specify the name of the class !';
            die;
        }

        $properties = self::STDIN_getProperties();
        $propertiesString = self::getProperties($properties);
        $gettersAndSettersString = self::getGettersAndSetters($properties);
        
        if (!file_exists(CLASSES_DIR . "/$classname.php")) 
        {
            self::new($classname, $propertiesString, $gettersAndSettersString);
        }
        else
        {
            self::update($classname, $propertiesString, $gettersAndSettersString);
        }

        die('Class created/updated !');
    }

    static public function new(string $classname, string $propertiesString, string $gettersAndSettersString)
    {
        $file = <<<EOT
        <?php
        
        class $classname
        {
        EOT;

        $file .= "\r\n";
        $file .= $propertiesString;
        $file .= "\r\n";
        $file .= $gettersAndSettersString;
        $file .= "}";

        return file_put_contents(CLASSES_DIR . "/$classname.php", $file);
    }

    static public function update(string $classname, string $propertiesString, string $gettersAndSettersString)
    {
        $file = file_get_contents(CLASSES_DIR . "/$classname.php");
        $firstMethodIndex = strpos($file, 'public function');
        if (!$firstMethodIndex)
        {
            return self::new($classname, $propertiesString, $gettersAndSettersString);
        }

        $file = substr_replace($file, $propertiesString . "\r\n", $firstMethodIndex - self::$tabLength, 0);
        $lastBracketIndex = strrpos($file, '}');
        $file = substr_replace($file, "\r\n" . $gettersAndSettersString, $lastBracketIndex, 0);

        return file_put_contents(CLASSES_DIR . "/$classname.php", $file);
    }

    static public function STDIN_getProperties()
    {
        $properties = [];
        while(true) {
            echo "Please enter a new property: ";
            $property = trim(fgets(STDIN));
            if (!$property) {
                break;
            }
        
            echo "What type is it? (default = string) ";
            $type = trim(fgets(STDIN));
            if (!$type) {
                $type = 'string';
            }
        
            echo "Is it nullable? (default = true) ";
            $nullable = trim(fgets(STDIN));
            if (!$nullable) {
                $nullable = '?';
            } else {
                if ($nullable[0] === 'y') {
                    $nullable = '?';
                } else {
                    $nullable = '';
                }
            }
        
            $properties[] = [$property, $type, $nullable];
        }

        return $properties;
    }

    static public function getProperties(array $properties): string
    {
        $text = '';
        foreach($properties as $i => $data) {
            $property = $data[0];
            $type = $data[1];
            $upper = ucfirst($type);

            $text .= <<<EOT
                /**
                 * @$upper
                 */
                private $$property;
            EOT;
            $text .= "\r\n";
            $text .= "\r\n";
        }

        return $text;
    }

    static public function getGettersAndSetters(array $properties): string
    {
        $text = '';
        foreach($properties as $i => $data) {
            $property = $data[0];
            $property_func_name = ucfirst(\Services\CaseConverter::toCamelCase($data[0]));
            $type = $data[1];
            $nullable = $data[2];
        
            $text .= <<<EOT
                public function get$property_func_name(): $nullable$type
                {
                    return \$this->$property;
                }
            
                public function set$property_func_name($nullable$type $$property)
                {
                    \$this->$property = \$$property;
            
                    return \$this;
                }
            EOT;
            $text .= "\r\n";
            $text .= "\r\n";
        }
        
        return $text;
    }
}
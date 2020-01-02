<?php

namespace HTTP;

class RequestData
{
    private $data = [];

    public function get()
    {
        return $this->data;
    }

    public function __construct()
    {
        $this->chomp($_GET);
        $this->chomp($_POST);
    }

    private function chomp($data)
    {
        foreach ($data as $key => $value) {
            $this->sanitize($key);
            $this->sanitize($value);
            $this->data[$key] = $value;
        }
    }

    private function sanitize(&$string)
    {
        $string = htmlspecialchars($string);
    }

    public function assert(array $assertions, array $options = [])
    {
        foreach ($assertions as $variableName => $type)
        {
            switch ($type) {
                case 'int':
                case 'float':
                case 'bool':
                case 'email':
                    $filter = $this->getFilter($type);
                    $this->data[$variableName] = 
                        filter_input(INPUT_GET, $variableName, $filter) ??
                        filter_input(INPUT_POST, $variableName, $filter);
                break;
                case 'DateTime':
                    $this->data[$variableName] = \DateTime::createFromFormat(
                        $options['format'],
                        $variableName
                    );
                break;
                default:
                    if (class_exists($type)) {
                        $this->data[$variableName] = new $type($variableName);
                    }
            }
        } 
    }

    private $filters = [
        'int' => FILTER_VALIDATE_INT,
        'float' => FILTER_VALIDATE_FLOAT,
        'bool' => FILTER_VALIDATE_BOOLEAN,
        'email' => FILTER_VALIDATE_EMAIL,
    ];
    private function getFilter(string $type)
    {
        return $this->filters[$type] ?? $type;
    }
}
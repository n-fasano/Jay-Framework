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

        $this->hydrate();
    }

    public function chomp($data)
    {
        foreach ($data as $key => $value) {
            $this->sanitize($key);
            $this->sanitize($value);
            $this->data[$key] = $value;
        }
    }

    public function sanitize(&$string)
    {
    
    }

    public function hydrate()
    {
        
    }
}
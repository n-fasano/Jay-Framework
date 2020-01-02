<?php

class AutowiredClass
{
    private $dependencies = [];

    public function __set(string $name, $value)
    {
        if (!isset($this->dependencies[$name])) {
            throw new Error('This property does not exist.');
        }
        throw new Error('Can\'t reassign dependency.');
    }

    public function __get(string $name)
    {
        if (!isset($this->dependencies[$name])) {
            throw new Error('This property does not exist.');
        }
        return $this->dependencies[$name];
    }

    public function __isset(string $name)
    {
        if (!isset($this->dependencies[$name])) {
            throw new Error('This property does not exist.');
        }
        return isset($this->dependencies[$name]);
    }

    public function __unset(string $name)
    {
        if (!isset($this->dependencies[$name])) {
            throw new Error('This property does not exist.');
        }
        throw new Error('Can\'t unset dependency.');
    }

    public function __construct()
    {
        $comment = (new ReflectionClass($this))->getDocComment();
        preg_match_all('/@Require ([^ ]+) ([^\r\n]+)\r\n/', $comment, $matches);

        for ($i = 0; $i < count($matches[1]); $i++) {
            $this->dependencies[$matches[2][$i]] = Container::get($matches[1][$i]);
        }
    }

    public function readAsserts()
    {

    }

    public function __call(string $name, array $arguments)
    {
        dd('hit');
    }
}
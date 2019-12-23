<?php

namespace Controllers;

class Test
{
    private $prop;
    public function __construct()
    {
        $this->prop = new \stdClass;
    }
}

class OtherController
{
    public $property1;
    protected $property2;

    public function __construct()
    {
        $this->property2 = new Test;
    }

    /**
     * @Route /other
     */
    public function toDo()
    {
    }

    /**
     * @Route /base
     */
    public function base()
    {
        return 'great';
    }
}

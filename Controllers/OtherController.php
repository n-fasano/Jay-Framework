<?php

namespace Controllers;

class OtherController
{
    public $property1;
    protected $property2;

    /**
     * @Route /other
     */
    public function toDo()
    {
    }

    /**
     * @Route /
     */
    public function base()
    {
        echo 'great';
    }
}

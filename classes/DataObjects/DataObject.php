<?php

namespace DataObjects;

use ORM\ORM;

class DataObject
{
    public function __construct(int $id = null)
    {
        if ($id) {
            ORM::load($this, $id);
        }
    }
}
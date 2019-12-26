<?php

namespace Controllers;

class ApiController
{
    /**
     * @Route /test/route
     */
    public function test_route()
    { }

    /**
     * @Route /test/route/dude
     */
    public function test_route_dude()
    { }
    
    /**
     * @Route /test/something
     */
    public function test_something()
    { }
}

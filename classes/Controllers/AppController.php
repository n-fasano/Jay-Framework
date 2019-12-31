<?php

namespace Controllers;

use AutowiredClass;
use HTTP\RequestData;

/**
 * @Require Cache\Cache cache
 */
class AppController extends AutowiredClass
{
    /**
     * @Route /
     */
    public function app()
    {
        $request = new RequestData;
        extract($request->get());
        dump($test);
        dump($this->cache);
        ob_start();
        include BASE_DIR . '/public/app.html';
        return ob_get_clean();
    }
}

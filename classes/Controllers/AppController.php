<?php

namespace Controllers;

use AutowiredClass;

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
        dump($this->cache);
        ob_start();
        include BASE_DIR . '/public/app.html';
        return ob_get_clean();
    }
}

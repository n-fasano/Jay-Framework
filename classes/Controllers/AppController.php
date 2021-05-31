<?php

namespace Controllers;

use AutowiredClass;

/**
 * @Require Cache\Cache cache
 * @Require HTTP\RequestData request
 */
class AppController extends AutowiredClass
{
    /**
     * @Get /
     * @Request\Assert test int
     * @Request\Assert var bool
     */
    public function app()
    {
        $this->request->assert([
            'test' => 'int',
            'var' => 'bool',
            'str' => 'email'
        ]);
        extract($this->request->get());

        dump($test, $var, $str);
        dump($this->cache);

        ob_start();
        include BASE_DIR . '/public/app.phtml';
        return ob_get_clean();
    }
}

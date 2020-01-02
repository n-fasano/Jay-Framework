<?php

namespace Controllers;

use AutowiredClass;
use HTTP\RequestData;
use ReflectionMethod;

/**
 * @Require Cache\Cache cache
 * @Require HTTP\RequestData request
 */
class AppController extends AutowiredClass
{
    /**
     * @Route /
     * @Request\Assert test int
     * @Request\Assert var bool
     */
    public function app()
    {
        $this->test();
        $refl = new ReflectionMethod(__CLASS__, debug_backtrace()[0]['function']);
        dd($refl->getDocComment());
        $this->request->assert([
            'test' => 'int',
            'var' => 'bool',
            'str' => 'email'
        ]);
        extract($this->request->get());
        dump($test, $var, $str);
        dump($this->cache);
        ob_start();
        include BASE_DIR . '/public/app.html';
        return ob_get_clean();
    }
}

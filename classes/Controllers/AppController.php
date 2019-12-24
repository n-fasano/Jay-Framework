<?php

namespace Controllers;

class AppController
{
    /**
     * @Route /
     */
    public function app()
    {
        ob_start();
        include BASE_DIR . '/public/app.html';
        return ob_get_clean();
    }
}

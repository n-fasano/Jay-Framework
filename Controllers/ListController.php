<?php

namespace Controllers;

/**
 * Coucou
 */
class ListController
{
    public $property1;
    protected $property2;
    private $property3;

    public function __construct()
    {
        $this->property1 = ['clef' => 'valeur'];
        $this->property2 = new OtherController;
        $this->property3 = 1;
    }

    /**
     * @Route /listes
     */
    public function index()
    {
        ob_start();
        include BASE_DIR . '/templates/app.html';
        return ob_get_clean();
    }

    /**
     * @Route /liste/#int
     */
    public function show(int $id)
    {
        return "show => { id: $id }";
    }



    /**
     * @Route /videos
     * @COUCOU
     * @Route /guidon
     */
    public function create()
    {
        return 'create list';
    }
}

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
        return 'ListController::index /listes';
    }

    /**
     * @Route /liste/#int/show
     */
    public function show(int $id)
    {
        return "show => { id: $id }";
    }

    /**
     * @Route /liste/#int/update
     */
    public function update(int $id)
    {
        return "update => { id: $id }";
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

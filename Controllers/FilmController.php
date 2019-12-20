<?php

namespace Controllers;

/**
 * Coucou
 */
class FilmController
{
    public $property1;
    protected $property2;
    private $property3;

    public function __construct()
    {
        $this->property1 = ['1'];
        $this->property2 = new OtherController;
        $this->property3 = 1;
    }

    /**
     * @Route /films
     * @Info Coucou
     */
    public function index()
    {
        include BASE_DIR . '/templates/index.html';
        die;
    }

    /**
     * @Route /films/#int
     * @COUCOU
     */
    public function show(int $id)
    {
        return [
            'show' => 2
        ];
    }

    /**
     * @Route /videos
     * @COUCOU
     */
    public function create()
    {
        return [
            'show' => 2
        ];
    }
}

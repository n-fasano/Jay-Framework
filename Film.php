<?php

class Film
{
    /**
     * int
     */
    private $test;

    public function getTest(): int
    {
        return $this->test;
    }

    public function setTest(int $test)
    {
        $this->test = $test;

        return $this;
    }
}

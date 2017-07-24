<?php

namespace App\Entities;

class Footballer
{
    private $name = null;
    private $goals = 0;

    public function __construct(Name $name, int $goals)
    {
        $this->name = $name;
        $this->goals = $goals;
    }

    public function getName() : Name
    {
        return $this->name;
    }

    public function getGoals() : int
    {
        return $this->goals;
    }
}
<?php
namespace App\Entities;


class Name
{
    private $firstname;
    private $middlename;
    private $lastname;


    public function __construct(string $lastname, string $firstname, string $middlename = '')
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->middlename = $middlename;
    }

    public function getShortName() : string
    {
        return sprintf('%s %s', $this->firstname, $this->lastname);
    }

    public function getRandomName() : string
    {
        return rand(0, 1) ? $this->firstname : $this->lastname;
    }
}
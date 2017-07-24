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

    public function getName() : string
    {
        return sprintf('%s %s', $this->firstname, $this->lastname);
    }
}
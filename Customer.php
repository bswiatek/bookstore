<?php

class Customer
{
    private $id;
    private $firstName;
    private $surname;
    private $email;

    public function __construct($id, $firstName, $surname, $email)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->email = $email;
    }
}
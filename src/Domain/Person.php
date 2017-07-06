<?php

namespace Bookstore\Domain;

use Bookstore\Utils\Unique;

class Person
{
    use Unique;

    protected $name;
    protected $surname;
    private $email;

    public function __construct($id, string $name, string $surname, string $email)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->setId($id);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}


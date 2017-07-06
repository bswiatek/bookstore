<?php

namespace Bookstore\Domain;


class Person
{
    protected $name;
    protected $surname;

    public function __construct(string $firstName, string $surname)
    {
        $this->name = $firstName;
        $this->surname = $surname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }
}


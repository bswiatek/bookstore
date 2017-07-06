<?php

namespace Bookstore\Domain;

class Customer
{
    private $id;
    private $firstName;
    private $surname;
    private $email;
    private static $lastId = 0;

    public function __construct($id, string $firstName, string $surname, string $email)
    {
        if ($id == null) {
            $this->id = ++self::$lastId;
        } else {
            $this->id = $id;
            if ($id > self::$lastId) {
                self::$lastId = $id;
            }
        }
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public static function getLastId(): int
    {
        return self::$lastId;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }
}
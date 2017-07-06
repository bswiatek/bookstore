<?php

namespace Bookstore\Domain;


class Person
{
    private static $lastId = 0;
    private $id;
    protected $name;
    protected $surname;
    private $email;

    public function __construct($id, string $name, string $surname, string $email)
    {
        if (empty($id)) {
            $this->id = ++self::$lastId;
        } else {
            $this->id = $id;
            if ($id > self::$lastId) {
                self::$lastId = $id;
            }
        }
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public static function getLastId(): int
    {
        return self::$lastId;
    }
}


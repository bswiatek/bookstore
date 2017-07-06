<?php

namespace Bookstore\Domain;

abstract class Customer extends Person
{
    private static $lastId = 0;
    private $id;
    private $email;

    abstract public function getMonthlyFee();
    abstract public function getAmountToBorrow();
    abstract public function getType();

    public function __construct($id, string $name, string $surname, string $email)
    {
        parent::__construct($name, $surname);
        if (empty($id)) {
            $this->id = ++self::$lastId;
        } else {
            $this->id = $id;
            if ($id > self::$lastId) {
                self::$lastId = $id;
            }
        }
        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public static function getLastId(): int
    {
        return self::$lastId;
    }
}
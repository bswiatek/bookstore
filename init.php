<?php

use Bookstore\Domain\Customer\CustomerFactory;
use Bookstore\Utils\Config;

function autoloader($classname) {
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__ . '/src/' . $directory . '.php';
    require_once($filename);
}
spl_autoload_register('autoloader');


function addTaxes(array &$book, $index, $percentage) {
    $book['price'] += round($percentage * $book['price'], 2);
};

class Taxes {
    public static function add(array &$book, $index, $percentage)
    {
        if (isset($book['price'])) {
            $book['price'] += round($percentage * $book['price'], 2);
        }
    }
    public function addTaxes(array &$book, $index, $percentage)
    {
        if (isset($book['price'])) {
            $book['price'] += round($percentage * $book['price'], 2);
        }
    }
}

$books = [
    ['title' => '1984', 'price' => 8.15],
    ['title' => 'Don Quijote', 'price' => 12.00],
    ['title' => 'Odyssey', 'price' => 3.55]
];

array_walk($books, 'addTaxes', 0.16);
var_dump($books);

array_walk($books, ['Taxes', 'add'], 0.16);
var_dump($books);

array_walk($books, [new Taxes(), 'addTaxes'], 0.16);
var_dump($books);
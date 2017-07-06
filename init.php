<?php

use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;

function autoloader($classname) {
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__ . '/src/' . $directory . '.php';
    require_once($filename);
}
spl_autoload_register('autoloader');

$book1 = new Book("1984", "George Orwell", 9785267006323, 12);
$book2 = new Book("To Kill a Mockingbird", "Harper Lee", 9780061120084, 2);

$customer1 = new Customer(3, 'John', 'Doe', 'johndoe@mail.com');
$customer2 = new Customer( null, 'Mary', 'Poppins', 'mp@mail.com');
$customer2 = new Customer(7, 'James', 'Bond', '007@mail.com');

echo Customer::getLastId();
echo $customer1::getLastId();
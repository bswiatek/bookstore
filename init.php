<?php

use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;
use Bookstore\Domain\Customer\Basic;
use Bookstore\Domain\Customer\Premium;

function autoloader($classname) {
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__ . '/src/' . $directory . '.php';
    require_once($filename);
}
spl_autoload_register('autoloader');


function checkIfValid(Customer $customer, array $books): bool {
    return $customer->getAmountToBorrow() >= count($books);
}

$book1 = new Book("1984", "George Orwell", 9785267006323, 12);
$book2 = new Book("To Kill a Mockingbird", "Harper Lee", 9780061120084, 2);

$customer1 = new Basic(3, 'John', 'Doe', 'johndoe@mail.com');
$customer2 = new Premium( null, 'Mary', 'Poppins', 'mp@mail.com');
$customer3 = new Premium(7, 'James', 'Bond', '007@mail.com');

echo Customer::getLastId();
echo $customer1::getLastId();

var_dump(checkIfValid($customer1, [$book1]));
var_dump(checkIfValid($customer3, [$book1]));
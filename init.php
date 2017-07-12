<?php

use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;
use Bookstore\Domain\Payer;
use Bookstore\Domain\Customer\Basic;
use Bookstore\Domain\Customer\Premium;
use Bookstore\Exceptions\ExceededMaxAllowedException;
use Bookstore\Exceptions\InvalidIdException;

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

function processPayment(Payer $payer, float $amount) {
    if ($payer->isExtentOfTaxes()) {
        echo "What a lucky one...";
    } else {
        $amount *= 1.16;
    }
    $payer->pay($amount);
}

function createBasicCustomer(int $id) {
    try {
        return new Basic($id, "name", "surname", "email");
    } catch (InvalidIdException $e) {
        echo "You cannot provide a negative id\n";
    } catch (ExceededMaxAllowedException $e) {
        echo "No more customers are allowed\n";
    } catch (Exception $e) {
        echo "Unknown Exception: " . $e->getMessage();
    }
}

$book1 = new Book("1984", "George Orwell", 9785267006323, 12);
$book2 = new Book("To Kill a Mockingbird", "Harper Lee", 9780061120084, 2);

$customer1 = new Basic(3, 'John', 'Doe', 'johndoe@mail.com');
$customer2 = new Premium( null, 'Mary', 'Poppins', 'mp@mail.com');
$customer3 = new Premium(7, 'James', 'Bond', '007@mail.com');

createBasicCustomer(1);
createBasicCustomer(-1);
createBasicCustomer(55);
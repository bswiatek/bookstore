<?php

namespace Bookstore\Tests\Domain\Customer;

use Bookstore\Domain\Sale;
use PHPUnit_Framework_TestCase;

class SaleTest extends PHPUnit_Framework_TestCase {

    public function testNewSaleHasNoBooks() {
        $sale = new Sale();

        $this->assertEmpty(
            $sale->getBooks(),
            'When new, sale should have no books.'
        );
    }

    public function testAddNewBook() {
        $sale = new Sale();
        $sale->addBook(123);

        $this->assertSame(
            [123 => 1],
            $sale->getBooks(),
            'Books array does not match..'
        );
    }

    public function testAddMultipleBooks() {
        $sale = new Sale();
        $sale->addBook(123, 4);
        $sale->addBook(456, 2);
        $sale->addBook(456, 8);

        $this->assertSame(
            [123 => 4, 456 => 10],
            $sale->getBooks(),
            'Books are not as expected.'
        );
    }
}
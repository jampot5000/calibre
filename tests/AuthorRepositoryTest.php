<?php

namespace Jampot5000\Calibre\Tests;

use Jampot5000\Calibre\CalibreInterface;
use Jampot5000\Calibre\Models\Interfaces\Author;
use Jampot5000\Calibre\Models\Interfaces\Book;

class AuthorRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $calibreInterface;
    private $authorRepository;
    private $bookRepository;

    public function setUp()
    {
        $this->calibreInterface = new CalibreInterface(new TestingCalibreConfig());
        $this->authorRepository = $this->calibreInterface->getAuthorRepository();
        $this->bookRepository   = $this->calibreInterface->getBookRepository();
    }

    public function testCanGetAuthorById()
    {
        $author = $this->authorRepository->findById(1);

        $this->assertInstanceOf(Author::class, $author);
        $this->assertEquals("John Schember", $author->getName());
        $this->assertEquals(1, $author->getId());
    }

    public function testCanGetAuthorByName()
    {
        $author = $this->authorRepository->findByName("John Schember");

        $this->assertInstanceOf(Author::class, $author);
        $this->assertEquals("John Schember", $author->getName());
        $this->assertEquals(1, $author->getId());
    }

    public function testCanGetAuthorBook()
    {
        $author = $this->authorRepository->findById(1);

        $books = $author->getBooks();
        $this->assertNotEmpty($books);
        $this->assertInstanceOf(Book::class, $books[0]);
    }
}

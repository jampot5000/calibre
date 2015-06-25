<?php

namespace Jampot5000\Calibre\Tests;

use Jampot5000\Calibre\Models\Interfaces\Author;
use Jampot5000\Calibre\Models\Interfaces\Book;
use Jampot5000\Calibre\Repositories\Eloquent\AuthorRepository;

class AuthorRepositoryTest extends \PHPUnit_Framework_TestCase
{
    public $ar;

    public function setUp()
    {
        $this->ar = new AuthorRepository();
    }

    public function testCanGetAuthorById()
    {
        $author = $this->ar->findById(1);

        $this->assertInstanceOf(Author::class, $author);
        $this->assertEquals("John Schember", $author->getName());
        $this->assertEquals(1, $author->getId());
    }

    public function testCanGetAuthorByName()
    {
        $author = $this->ar->findByName("John Schember");

        $this->assertInstanceOf(Author::class, $author);
        $this->assertEquals("John Schember", $author->getName());
        $this->assertEquals(1, $author->getId());
    }

    public function testCanGetAuthorBook()
    {
        $author = $this->ar->findById(1);

        $books = $author->getBooks();
        $this->assertNotEmpty($books);
        $this->assertInstanceOf(Book::class, $books[0]);
    }
}

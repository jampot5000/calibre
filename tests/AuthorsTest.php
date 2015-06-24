<?php
namespace Jampot5000\Calibre\Tests;

use Illuminate\Database\Eloquent\Collection;
use Jampot5000\Calibre\Models\Author;

class AuthorsTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetAuthors()
    {
        $authors = Author::all();

        $this->assertFalse($authors->isEmpty(), "Collection should not be empty");
        $this->assertCount(2, $authors);

        $this->assertInstanceOf(Collection::class, $authors);
        $this->assertInstanceOf(Author::class, $authors->first());
    }

    public function testCanGetJohnSchember()
    {
        $author = Author::whereName('John Schember')->get();

        $this->assertFalse($author->isEmpty(), "Collection should not be empty");
        $this->assertCount(1, $author);

        $this->assertInstanceOf(Collection::class, $author);
        $this->assertInstanceOf(Author::class, $author->first());
    }
}

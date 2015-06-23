<?php
namespace Jampot5000\Calibre\Tests;

class OneTest extends TestBase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testCanGetAuthors()
    {
        $authors = \Jampot5000\Calibre\Models\Author::all()->toArray();

        $this->assertNotEmpty($authors, "Array should not be empty, should have authors in.");
    }
}

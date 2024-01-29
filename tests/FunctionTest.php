<?php
use PHPUnit\Framework\TestCase;


class FunctionTest extends TestCase
{
    public function testAddReturnsTheCorrectSum()
    {
        require "src/functions.php";

        $this->assertEquals(4, add(2,2));
        $this->assertEquals(9, add(2,7));
    }

    public function testAddDoesNotReturnsTheCorrectSum()
    {
        $this->assertNotEquals(4, add(3,2));
        $this->assertNotEquals(9, add(1,7));
    }

}
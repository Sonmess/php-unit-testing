<?php

use PHPUnit\Framework\TestCase;
require './src/functions.php';

class FunctionTest extends TestCase
{
    public function testAddReturnsCorrectSum()
    {   
        $this->assertEquals(4, add(2,2));
        $this->assertEquals(8, add(3, 5));
    }

    public function testAddDoesNotReturnIncorrectSum()
    {
        $this->assertNotEquals(5, add(2, 2));
    }
}

?>
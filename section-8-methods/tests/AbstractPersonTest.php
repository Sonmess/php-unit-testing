<?php

use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{

    public function testNameAndTitle()
    {
        $person = new Doctor('Green');

        $this->assertEquals('Dr. Green', $person->getNameAndTitle());
    }

    public function testNameAndTitleAbstractPerson()
    {
        $mock = $this->getMockBuilder(AbstractPerson::class)
            ->setConstructorArgs(['Blue'])
            ->getMockForAbstractClass();

        $mock->method('getTitle')
            ->willReturn('Dr.');
        
        $this->assertEquals('Dr. Blue', $mock->getNameAndTitle());
    }
}

?>
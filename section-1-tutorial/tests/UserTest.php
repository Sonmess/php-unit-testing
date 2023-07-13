<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        $user = new User();
        $user->firstName = 'Matej';
        $user->lastName = 'Bohac';

        $this->assertEquals('Matej Bohac', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();
        $this->assertEquals('', $user->getFullName());
    }

    public function testUserHasFirstName()
    {
        $user = new User();
        $user->firstName = 'Lena';
        $this->assertEquals('Lena', $user->firstName);
    }

    /**
     * @test
     */
    public function user_has_last_name()
    {
        $user = new User();
        $user->lastName = 'Pena';
        $this->assertEquals('Pena', $user->lastName);
    }

    public function testNotificationIsSent()
    {
        $user = new User();
        $mock_mailer = $this->createMock(Mailer::class);
        $mock_mailer
            ->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('test@mail.com'), $this->equalTo('Hello'))
            ->willReturn(true);
        $user->email = 'test@mail.com';
        $user->injectMailer($mock_mailer);
        $result = $user->notify('Hello');
        $this->assertTrue($result);
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User();
        $mock_mailer = $this->getMockBuilder(Mailer::class)
            ->setMethods(null)
            ->getMock();
        $user->injectMailer($mock_mailer);
        $this->expectException(Exception::class);
        $user->notify('Hello');
    }
}

?>
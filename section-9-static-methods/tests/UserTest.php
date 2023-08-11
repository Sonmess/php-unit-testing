<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUser()
    {
        $user = new User('test@example.com');

        $mailer = new Mailer();
        $user->setMailer($mailer);

        $this->assertTrue($user->notify('Hello!'));
    }
}
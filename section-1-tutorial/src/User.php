<?php

class User
{
    public $firstName;

    public $lastName;

    public $email;

    public $mailer;

    public function getFullName()
    {
        return trim($this->firstName . ' ' . $this->lastName);
    }

    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }

    public function injectMailer($mailer)
    {
        $this->mailer = $mailer;
        return $this;
    }
}
?>
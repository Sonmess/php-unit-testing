<?php

class User {
    public $email;

    protected $mailer;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function notify(string $message)
    {
        return $this->mailer::send($this->email, $message);
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}
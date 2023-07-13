<?php

class Mailer
{   
    public function sendMessage($email, $message)
    {
        if (empty($email)) {
            throw new \Exception('Email is empty');
        }
        sleep(3);
        echo "send '$message' to '$email'";
        return true;
    }
}
?>
<?php

namespace App\Mailers;

use Illuminate\Contracts\Mail\Mailer as Mail;

abstract class AbstractMailer
{
    /**
     * @var Mail
     */
    private $mail;

    /**
     * @param Mail $mail
     */
    function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @param $email
     * @param $subject
     * @param $view
     * @param array $data
     */
    public function sendTo($email, $subject, $view, $data = [])
    {
        $emails =  is_array($email) ? $email : [$email];

        foreach ($emails as $email) {
            $this->mail->queue($view, $data, function($message) use($email, $subject)
            {
                $message->to($email)->subject($subject);
            });
        }
    }
}
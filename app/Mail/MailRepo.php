<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 6/16/2015
 * Time: 3:27 PM
 */

namespace App\Mail;


use Illuminate\Mail\Mailer;

class MailRepo {
    /**
     * @var Mail
     */
    private $mail;

    public function __construct(Mailer $mail)
    {

        $this->mail = $mail;
    }
    function emailAdmin($title,$admin_subject, array $vars){
        $this->mail->send('emails.contact_us',[
            'title' => $title,
            'vars' => $vars


        ],function($message) use ($admin_subject){
            $message->subject($admin_subject);
            $message->to('jdelise@c21scheetz.com');
            //$message->cc('pbender@c21scheetz.com');
            $message->cc('jshort@c21scheetz.com');
        });
    }
}
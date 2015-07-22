<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 6/16/2015
 * Time: 3:27 PM
 */

namespace App\Mail;


use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Config;

class MailRepo {
    /**
     * @var Mail
     */
    private $mail;

    public function __construct(Mailer $mail)
    {

        $this->mail = $mail;
    }
    function sendBusinessPlan($args,$new_lead,$user){
        $this->mail->send('emails.new_business_plan',['args' => $args],function($message) use ($new_lead,$user){
            $message->subject($new_lead->first_name . ' ' . $new_lead->last_name . ' has filled out a new business plan.');
            foreach(Config::get('c21.admin-emails') as $admin_email){
                $message->bcc($admin_email);
            }
            $message->to($user->email);
        });
    }
    function emailAdmin($title,$admin_subject, array $vars){
        $this->mail->send('emails.contact_us',[
            'title' => $title,
            'vars' => $vars
        ],function($message) use ($admin_subject){
            foreach(Config::get('c21.admin-emails') as $admin_email){
                $message->bcc($admin_email);
            }
            $message->to(Config::get('c21.recruiter.email'));
        });
    }
}
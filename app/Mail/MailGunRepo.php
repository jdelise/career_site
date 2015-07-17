<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 5/11/2015
 * Time: 4:30 PM
 */

namespace App\Mail;


use Mailgun\Mailgun;

class MailGunRepo {

    protected $mgClient;
    public function __construct()
    {
        $this->mgClient = new Mailgun('key-5d5109b838c4a16a1c47b67bef1b63c2');
    }
    public function createRoute(){
        $result = $this->mgClient->post("routes", array(
            'priority'    => 0,
            'expression'  => 'match_recipient(".*@indycareerinrealestate.com")',
            'action'      => array('forward("http://indycareerinrealestate.com/message_transport")', 'stop()'),
            'description' => 'Sample route'
        ));
        return $result;
    }
}
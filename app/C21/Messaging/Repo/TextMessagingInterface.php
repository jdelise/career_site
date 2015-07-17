<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 3/30/2015
 * Time: 8:56 AM
 */

namespace App\C21\Messaging\Repo;


interface TextMessagingInterface {
    public function sendTextMessage($number, $message);
    public function sendToZipCode($inputs);
}
<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 7/24/2015
 * Time: 3:15 PM
 */

namespace App\C21;


use App\Recruits;

class AddLeadToCrm {

    public function __construct()
    {

    }
    public function addLeadToCrm($lead){
        if($this->doesLeadExistInCrm($lead) == true){
            return true;
        }
        //dd($lead->toArray());
        $recruit = Recruits::create($lead->toArray());
        if(!$recruit){
            return false;
        }
        return true;
    }
    public function doesLeadExistInCrm($lead){
        $recruit = Recruits::where('email',$lead->email)->first();
        if($recruit){
            return true;
        }
        return false;
    }
}
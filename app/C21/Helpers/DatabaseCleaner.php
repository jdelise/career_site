<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 5/5/2015
 * Time: 1:17 PM
 */

namespace app\C21\Helpers;


use App\Appointment;
use App\Lead;

class DatabaseCleaner {
    public function __construct()
    {

    }
    public function updateAppointments(){
        $appointments = Appointment::all();
        foreach($appointments as $appointment){
            $lead = Lead::where('id', $appointment->lead_id)->first();
            if($lead){
                $appointment->agent_id = $lead->agent_crest_id;
                $appointment->save();
            }

        }
    }
    public function updateLeadDatabase(){
        $this->modifyDbC21();
        $this->modifyDbHomeFinder();
        $this->modifyDbLiveChat();
        $this->modifyDbRealtor();
        $this->modifyDbScheetz();
        $this->modifyDbTrulia();
        $this->modifyDbZillow();
        $this->modifyDbVoicePad();
    }
    protected function modifyDbTrulia(){
        $leads = Lead::where('source_name','like','%Trulia%')->get();
        foreach($leads as $lead){
            $lead->source_name = 'Trulia';
            $lead->save();
        }
    }
    protected function modifyDbZillow(){
        $leads = Lead::where('source_name','like','%Zillow%')->get();
        foreach($leads as $lead){
            $lead->source_name = 'Zillow';
            $lead->save();
        }
    }
    protected function modifyDbRealtor(){
        $leads = Lead::where('source_name','like','%Realtor.com%')->get();
        foreach($leads as $lead){
            $lead->source_name = 'Realtor.com';
            $lead->save();
        }
    }
    protected function modifyDbC21(){
        $leads = Lead::where('source_name','like','%CENTURY21.com%')
            ->orWhere('source_name','like','%C21 Mobile%')
            ->orWhere('source_name','like','%Century21Global.com%')
            ->orWhere('source_name','like','%Century21 %')
            ->get();
        foreach($leads as $lead){
            $lead->source_name = 'CENTURY21.com';
            $lead->save();
        }
    }
    protected function modifyDbScheetz(){
        $leads = Lead::where('source_name','like','%Scheetz%')->get();
        foreach($leads as $lead){
            $lead->source_name = 'Scheetz';
            $lead->save();
        }
    }
    protected function modifyDbLiveChat(){
        $leads = Lead::where('source_name','like','%Live Chat%')->get();
        foreach($leads as $lead){
            $lead->source_name = 'Live Chat';
            $lead->save();
        }
    }
    protected function modifyDbVoicePad(){
        $leads = Lead::where('source_name','like','%VoicePad%')
            ->orWhere('source_name','like','%Voice Pad%')
            ->get();
        foreach($leads as $lead){
            $lead->source_name = 'VoicePad';
            $lead->save();
        }
    }
    protected function modifyDbHomeFinder(){
        $leads = Lead::where('source_name','like','%Homefinder.com%')->get();
        foreach($leads as $lead){
            $lead->source_name = 'Homefinder.com';
            $lead->save();
        }
    }
}
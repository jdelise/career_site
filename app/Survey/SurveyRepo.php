<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 6/10/2015
 * Time: 9:07 AM
 */

namespace App\Survey;


use App\C21\Users\User;
use App\Survey;
use Illuminate\Support\Facades\Mail;

class SurveyRepo {

    public function generateSurvey($user_id, $recruit_id){
        $survey = new Survey();
        $survey->user_id = $user_id;
        $survey->recruit_id = $recruit_id;
        $survey->save();
        $this->mailSurvey($survey);
        return $survey;
    }
    public function getSurveys(){
        $surveys = [];
        $surveys['completed'] = Survey::where('completed' , 1)->with('recruit')->get();
        $surveys['not_completed'] = Survey::where('completed' , 0)->with('recruit')->get();
        return $surveys;
    }
    public function getSurvey($id){
        $survey = Survey::where('id',$id)->with('user','recruit')->first();
        return $survey;
    }
    protected function mailSurvey($survey){
        $user = User::find($survey->user_id);
        Mail::send('emails.send_survey',['survey_id' => $survey->id, 'user' => $user->first_name],function($message) use ($user){
            $message->to($user->email);
            $message->bcc('jdelise@c21scheetz.com');
            $message->subject('Survey Request');
        });
    }
}
<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment_Message extends Model {
    protected $table = 'appointment_message';
	//
    protected $guarded = ['id'];
    public function agents()
    {
        return $this->belongsToMany('App\Agents','response_agent', 'message_id', 'agent_id')->withTimestamps();
    }
}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Agents extends Model {
    protected $table = 'agents';
    protected $guarded =['email2'];
	//
    public function zipcodes()
    {
        return $this->belongsToMany('App\Zipcode','extra_data', 'agent_id', 'zip');
    }
    public function messages()
    {
        return $this->belongsToMany('App\Appointment_Message','response_agent', 'agent_id', 'message_id')->withTimestamps();
    }
    public function agentData()
    {
        return $this->hasMany('App\AgentData', 'agent_id');
    }
    public function experience_level()
    {
        return $this->hasOne('App\ExperienceLevel');
    }
    public function real_estate_school(){
        return $this->hasOne('App\RealEstateSchool');
    }
    public function groups()
    {
        return $this->belongsToMany('App\Groups','agents_groups', 'agent_id','group_id')->withTimestamps();
    }
}

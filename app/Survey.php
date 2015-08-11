<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model {

	protected $guarded = ['id'];
    public function getDates()
    {
        return ['next_followup_date','created_at','updated_at'];
    }
    public function user(){
        return $this->belongsTo('App\C21\Users\User');
    }
    public function recruit(){
        return $this->belongsTo('App\Recruits');
    }
    public function setNextFollowupDateAttribute($value){
        $this->attributes['next_followup_date'] = Carbon::parse($value);
    }

}

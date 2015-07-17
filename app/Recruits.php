<?php namespace App;

use ArrayIterator;
use Illuminate\Database\Eloquent\Model;
use App\RecordsActivity;

class Recruits extends Model {
protected $guarded = ['id'];
    use RecordsActivity;
    public function getDates()
    {
        return ['last_followup_date','created_at','updated_at'];
    }
    public function user(){
        return $this->belongsTo('App\C21\Users\User');
    }
    public function notes(){
        return $this->hasMany('App\Note','recruit_id');
    }
    public function surveys(){
        return $this->hasMany('App\Survey');
    }
    public function tasks(){
        return $this->hasMany('App\Task');
    }

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model {

    protected $guarded = ['id'];

    //use RecordsActivity;

    public function notes(){
        return $this->hasMany('App\Note');
    }
    public function user(){
        return $this->belongsTo('App\C21\Users\User');
    }

}

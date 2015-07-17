<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model {
    use RecordsActivity;
	public function recruit(){
        return $this->belongsTo('App\Recruits','note_id','recruit_id');
    }
    public function lead(){
        return $this->belongsTo('App\Lead');
    }

}

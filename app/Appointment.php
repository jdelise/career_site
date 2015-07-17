<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model {

	protected $guarded = ['id'];

    public function getDates()
    {
        return ['appointment_date','created_at','updated_at'];
    }
    public function lead(){
        return $this->belongsTo('App\Lead');
    }


}

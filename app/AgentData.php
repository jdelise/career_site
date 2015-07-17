<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentData extends Model {
    protected $table = 'extra_data';
	//
    public function agents()
    {
        return $this->belongsTo('App\Agents');
    }

}

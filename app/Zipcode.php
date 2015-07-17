<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model {
    protected $table = 'zipcodes';
    protected $primaryKey = 'zipcode';
	//
    public function agents()
    {
        return $this->belongsToMany('App\Agents','extra_data', 'zip','agent_id');
    }
    public function agentsCountRelation()
    {
        return $this->belongsToMany('App\Agents','extra_data', 'zip', 'agent_id')->selectRaw('agent_id, count(*) as count, zip')->groupBy('agent_id');
    }
}

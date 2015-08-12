<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AgentData extends Model {
    protected $table = 'extra_data';
	//
    protected $guarded = ['id'];
    public function agents()
    {
        return $this->belongsTo('App\Agents');
    }
    public static function getAgentDataGrouped($id){
        $agent_data = new static;
        return $agent_data::where('agent_id',$id)->groupBy('zip')->get([
            DB::raw("zip,id, COUNT(CASE WHEN source IN ('S','B') THEN 1 END) as closings,COUNT(CASE WHEN source IN ('O') THEN 1 END) as office,COUNT(CASE WHEN source IN ('H') THEN 1 END) as home,COUNT(CASE WHEN source IN ('A') THEN 1 END) as other")
        ]);
    }

}

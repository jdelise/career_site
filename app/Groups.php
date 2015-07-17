<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model {
    protected $table = 'groups';
    protected $guarded =['id'];
	public function user(){
        return $this->belongsTo('App\C21\Users\User');
    }
    public function agents()
    {
        return $this->belongsToMany('App\Agents','agents_groups', 'group_id', 'agent_id')->withTimestamps();
    }

}

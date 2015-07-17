<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceLevel extends Model {

	protected $fillable = ['level'];

    public function agents(){
        return $this->hasMany('App\Agents');
    }

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RealEstateSchool extends Model {

    protected $fillable = ['name'];

    public function agents(){
        return $this->hasMany('App\Agents');
    }

}

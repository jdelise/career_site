<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model {

	protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip_code'
    ];
    public function users(){
        return $this->hasMany('App\C21\Users\User');
    }

}

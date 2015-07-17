<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model {
    /**
     * Get the user responsible for the given activity.
     *
     * @return User
     */
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo('App\C21\Users\User');
    }
    /**
     * Get the subject of the activity.
     *
     * @return mixed
     */
    public function subject()
    {
        return $this->morphTo();
    }

}

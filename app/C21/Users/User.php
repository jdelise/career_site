<?php namespace App\C21\Users;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
;
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
    use EntrustUserTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name','last_name','email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function getRoleListAttribute(){
        return $this->roles->lists('id');
}
    public function groups(){
        return $this->hasMany('App\Groups','user_id','id');
    }
    public function office(){
        return $this->belongsTo('App\Office');
    }
    public function recruits(){
        return $this->hasMany('App\Recruits','user_id','id');
    }
    public function surveys(){
        return $this->hasMany('App\Survey');
    }
    public function agents()
    {
        return $this->hasManyThrough('App\Groups', 'App\Agents','id','user_id');
    }
    public function notes(){
        return $this->hasMany('App\Note');
    }
    public function tasks(){
        return $this->hasMany('App\Task');
    }
    public function leads(){
        return $this->hasMany('App\Lead');
    }
    public function activity()
    {
        return $this->hasMany('App\Activity')->latest();
    }
    /**
     * Record new activity for the user.
     *
     * @param  string $name
     * @param  mixed  $related
     * @throws \Exception
     */
    public function recordActivity($name, $related)
    {
        if (! method_exists($related, 'recordActivity')) {
            throw new \Exception('..');
        }
        return $related->recordActivity($name);
    }
}

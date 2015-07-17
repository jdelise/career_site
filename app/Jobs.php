<?php namespace App;


use App\Events\JobWasPosted;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model {

    protected $fillable = ['title','description'];

    public static function post($title, $description){
       $job = new static(compact('title','description'));
        $job->save();
        event(new JobWasPosted($job));
        return $job;
    }

}

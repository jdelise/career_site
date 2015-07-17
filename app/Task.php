<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model {
    use RecordsActivity;
	protected $guarded = ['id'];

    public function getDates()
    {
        return ['due_date'];
    }
    public function user(){
        return $this->belongsTo('App\C21\Users\User');
    }
    public static function userAllCompletedTasks(){
        $task = new static;
        return $task->where('user_id',Auth::user()->id)->where('completed',true)->orderBy('due_date', 'ASC')->with('recruit')->get();
    }
    public static function userAllNonCompletedTasks(){
        $task = new static;
        return $task->where('user_id',Auth::user()->id)->where('completed',false)->orderBy('due_date', 'ASC')->with('recruit')->get();
    }
    public static function userActiveTasks(){
        $task = new static;
        return $task->where('user_id',Auth::user()->id)->where('completed',false)->where('due_date','>=',Carbon::now())->orderBy('due_date', 'ASC')->with('recruit')->get();
    }
    public static function userOverDueTasks(){
        $task = new static;
        return $task->where('user_id',Auth::user()->id)->where('completed',false)->where('due_date','<',Carbon::now())->orderBy('due_date', 'ASC')->with('recruit')->get();
    }
    public function recruit(){
        return $this->belongsTo('App\Recruits');
    }

}

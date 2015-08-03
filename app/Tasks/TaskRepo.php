<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 5/11/2015
 * Time: 10:08 AM
 */

namespace App\Tasks;


use App\Events\TaskWasAssignedToUser;
use App\Survey\SurveyRepo;
use App\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class TaskRepo {

    /**
     * @param array $args
     * @return static
     */
    public function createTask(array $args){
        $task = Task::create($args);
        return $task;
    }
    public function assignTaskToUser(array $args){
        $currentUserEmail = Auth::user()->email;
        $task = $this->createTask($args);
        //fire notify user event
        Event::fire(new TaskWasAssignedToUser($task, $currentUserEmail));
        return $task;
    }
    public function actionsThisMonth($user_id,$action){
        $tasks = Task::where('name',$action)->where('user_id',$user_id)->whereBetween('updated_at',[Carbon::now()->firstOfMonth(),Carbon::now()])->where('completed',1)->count();
        return $tasks;
    }
    public function actionsThisMonthSystem($action){
        $tasks = Task::where('name',$action)->whereBetween('updated_at',[Carbon::now()->firstOfMonth(),Carbon::now()])->where('completed',1)->count();
        return $tasks;
    }
    /**
     * @return mixed
     */
    public function getLateTasksBySystem(){
        $tasks = Task::where('completed',0)
            ->where('due_date' ,'<=', Carbon::now())
            ->with('user')
            ->get();
        return $tasks;
    }
    public function getLateTasksByUser($userId){
        $tasks = Task::where('user_id', $userId)
            ->where('completed',0)
            ->where('due_date' ,'<=', Carbon::now())
            ->get();
        return $tasks;
    }
    /**
     * @param $userId
     */
    public function getActiveTasksByUser($userId){
        $tasks = Task::where('user_id', $userId)
            ->where('completed',0)
            ->get();
        return $tasks;
    }

    /**
     * @param $userId
     */
    public function getCompletedTasksByUser($userId){
        $tasks = Task::where('user_id', $userId)
        ->where('completed',1)
            ->get();
        return $tasks;
    }

    /**
     * @param $taskId
     */
    public function editTask($taskId){

    }
    /**
     * @param $taskId
     */
    public function completeTask($taskId){
        $task = Task::find($taskId);
        //See if the task was an appointment and send survey
        if($task->name == 'Appointment'){
            $survey = new SurveyRepo();
            $survey->generateSurvey($task->user_id,$task->recruit_id);
        }
        $task->completed = true;
        $task->save();
    }

    /**
     * @param $takId
     */
    public function removeTask($takId){

    }
}
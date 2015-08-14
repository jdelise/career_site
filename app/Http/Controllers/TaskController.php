<?php namespace App\Http\Controllers;

use App\C21\Users\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;
use App\TaskName;
use App\Tasks\TaskRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;

class TaskController extends Controller {

    /**
     * @var TaskRepo
     */
    private $taskRepo;
    /**
     * @var Request
     */
    private $request;

    public function __construct(TaskRepo $taskRepo, Request $request)
    {

        $this->taskRepo = $taskRepo;
        $this->request = $request;
    }
    public function showTasksByUser($user_id){
        return $this->taskRepo->getActiveTasksByUser($user_id);
    }
    public function completeTask(Request $request){
        $this->taskRepo->completeTask($request->input('task_id'));
        Flash::success("Task was successfully completed");
        return redirect('admin/recruiting' . '/' . $request->input('recruit_id'));
    }
    public function showCompletedTasksByUser($user_id){
        return $this->taskRepo->getCompletedTasksByUser($user_id);
    }
    public function assignTaskToUser(){
        $args = [
            'name' => $this->request->input('name'),
            'due_date' => Carbon::parse($this->request->input('due_date')),
            'user_id' => $this->request->input('user_id'),
            'completed' => $this->request->input('completed'),
            'recruit_id' => $this->request->input('recruit_id'),
            'note' => $this->request->input('note')
        ];
        return $this->taskRepo->assignTaskToUser($args);
    }
    public function getLateTasksByUser($user_id){
        return $this->taskRepo->getLateTasksByUser($user_id);
    }
    public function getLateTasksBySystem(){
        return $this->taskRepo->getLateTasksBySystem();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createTask(){

        $task_name = $this->request->input('activity_type');
        $args = [
            'name' => $task_name,
            'due_date' => Carbon::parse($this->request->input('due_date')),
            'user_id' => $this->request->input('user_id'),
            'completed' => $this->request->input('completed'),
            'recruit_id' => $this->request->input('recruit_id'),
            'note' => $this->request->input('note')

        ];
        $task =  $this->taskRepo->createTask($args);
        $this->isTaskAssignedFromOtherUser($args['user_id'],$task);

        Flash::success("A new $task_name was successfully added");
        return redirect('admin/recruiting/' . $this->request->input('recruit_id'));
    }
    public function viewTask($id){
        $task_names = TaskName::all();
        $users = User::where('can_recruit','1')->get();
        $task = Task::where('id',$id)->with('recruit')->first();
        return view('admin.tasks.view_task',compact('task','task_names','users'));
    }
    public function updateTask($id){
        $task = Task::find($id);
        $task->update(Input::all());
        Flash::success('Task was updated');
        return redirect()->back();
    }
    protected function isTaskAssignedFromOtherUser($user_id,$task){
        if($user_id != Auth::user()->id){
            //Fire Event that emails user and the recruiter
            $user = User::find($user_id);
            Mail::send('emails.task_assigned',['task' => $task],function($message) use ($user){
                $message->to($user->email);
                $message->bcc('jdelise@c21scheetz.com');
                $message->subject('A new task has been assigned to you');
            });
            return true;
        }
        return false;

    }
    public function addTaskToOutlook(Request $request){
        $task = Task::where('id',$request->input('task_id'))->with('recruit')->first();
        $vcard = "BEGIN:VCALENDAR\n";
        $vcard .= "VERSION:2.0\n";
        $vcard .= "PRODID:-//Microsoft Corporation//Outlook MIMEDIR//EN";
        $vcard .= "METHOD:REQUEST\n"; // requied by Outlook
        $vcard .= "BEGIN:VEVENT\n";
        $vcard .= "UID:".date('Ymd').'T'.date('His')."-".rand()."-example.com\n"; // required by Outlok
        $vcard .= "DTSTAMP:".date('Ymd').'T'.date('His')."\n"; // required by Outlook
        $vcard .= "DTSTART:".$task->due_date->format('Ymd\THis'). "Z\n";
        $vcard .= "DTEND:".$task->due_date->addMinutes(15)->format('Ymd\THis'). "Z\n";
        $vcard .= "SUMMARY:" . $task->name . " with " . $task->recruit->first_name . " " .$task->recruit->last_name . "\n";
        $vcard .= "DESCRIPTION:" . $task->name . " with " . $task->recruit->first_name . " " .$task->recruit->last_name . "\n";
        $vcard .= "END:VEVENT\n";
        $vcard .= "END:VCALENDAR\n";
        return response($vcard, '200')
            ->header('Content-Type', 'text/Calendar')->header('Content-Disposition','inline; filename=calendar.vcs');
    }

}

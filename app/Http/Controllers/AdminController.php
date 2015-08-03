<?php namespace App\Http\Controllers;

use App\C21\Users\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lead;
use App\Recruits;
use App\Tasks\TaskRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        /*if(Auth::user()->can('can_view_dashboard')){
            return view('admin.pages.dashboard');
        }*/
        if(Auth::user()->can(['can_access_recruiting'])){
            return redirect('admin/recruiting/dashboard');
        }
        if(Auth::user()->can(['can_access_leadrouter'])){
            return redirect('admin/create_text_message');
        }

        return redirect('/');

    }
    public function adminDashboard(TaskRepo $taskRepo){
        if(Auth::user()->can('can_view_dashboard')){
            $leads = Lead::newestLeads();
            $users = User::where('can_recruit',1)->get();
            $overdue_tasks = $taskRepo->getLateTasksBySystem();
            $appointments = $taskRepo->appointmentsThisMonthSystem();
            $calls = $taskRepo->callsThisMonthSystem();
            $experienced_agents = Recruits::where('experience_level','Experienced Agent')->where('is_hired',1)->whereBetween('updated_at',[Carbon::now()->startOfYear(),Carbon::now()])->count();
            $new_agents = Recruits::where('experience_level','!=','Experienced Agent')->where('is_hired',1)->whereBetween('updated_at',[Carbon::now()->startOfYear(),Carbon::now()])->count();
           return view('admin.pages.dashboard',compact('leads','users','overdue_tasks','calls','appointments','experienced_agents','new_agents'));
       }
        return redirect('admin/recruiting/dashboard');
    }
}

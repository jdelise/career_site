<?php namespace App\Http\Controllers;

use App\C21\Recruits\RecruitImporter;
use App\C21\Reporting\Repo\ReportingRepo;
use App\C21\Rets\Rets;
use App\C21\Users\User;
use App\ExperienceLevel;
use App\Http\Requests;
use App\C21\Helpers\ImportHelper;
use App\C21\Helpers\PhoneFormater;
use app\Leads\LeadsRepo;
use App\Note;
use App\RealEstateSchool;
use App\RecruitListing;
use App\Recruits;
use App\Task;
use App\Tasks\TaskRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;


class RecruitsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('recruiting',['except'=>'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $orderBy = Input::get('sort_by');
        $order = Input::get('order');
        if(!isset($orderBy) && $orderBy == ''){
            $orderBy = 'last_name';
        }
        if(!isset($order) && $order == ''){
            $order = 'asc';
        }
        $recruits = Recruits::orderBy($orderBy,$order)->paginate(50);

        return view('admin.recruits.list', compact('recruits'));
    }
    public function dashboard(TaskRepo $taskRepo){
        $recruits = Recruits::where('user_id', Auth::user()->id)->orderBy('last_name')->get();
        $overDueTasks = Task::userOverDueTasks();
        $tasks = Task::userActiveTasks();
        $appointments = $taskRepo->actionsThisMonth(Auth::user()->id,'Appointment');
        $calls = $taskRepo->actionsThisMonth(Auth::user()->id,'Call');
        $experienced_agents = Recruits::where('user_id',Auth::user()->id)->where('experience_level','Experienced Agent')->where('is_hired',1)->whereBetween('updated_at',[Carbon::now()->startOfYear(),Carbon::now()])->count();
        $new_agents = Recruits::where('user_id',Auth::user()->id)->where('experience_level','!=','Experienced Agent')->where('is_hired',1)->whereBetween('updated_at',[Carbon::now()->startOfYear(),Carbon::now()])->count();
        return view('admin.pages.my_dashboard', compact('recruits','tasks','overDueTasks','user','appointments','calls','experienced_agents','new_agents','leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::all();
        $schools = RealEstateSchool::all();
        $levels = ExperienceLevel::all();
        return view('admin.recruits.create_recruit',compact('users','schools','levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $recruit = Recruits::where('email', $request->input('email'))->with('user')->first();
        if($recruit){
            Flash::error('That recruit is already assigned to ' . $recruit->user->first_name . ' ' . $recruit->user->last_name);
            return redirect('admin/recruiting/create_recruit');
        }
        $recruit = Recruits::create($request->all());
        Flash::success('Recruit has been added');
        return redirect('admin/recruiting' . '/' . $recruit->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param ReportingRepo $reportingRepo
     * @return Response
     */
    public function show($id, ReportingRepo $reportingRepo)
    {


        $recruit = Recruits::where('id', $id)->with('user','notes')->first();
        $tasks = Task::where('recruit_id',$id)->where('completed',false)->get();
        $users = User::where('can_recruit', true)->get();
        $numbers = $reportingRepo->recruitNumbers($recruit->mls_id);
        $pastNumbers = $reportingRepo->recruitPastNumbers($recruit->mls_id);
        return view('admin.recruits.show',compact('recruit','tasks','users','numbers','pastNumbers'));
    }
    public function edit_img()
    {
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $recruit = Recruits::find(Input::get('recruit_id'));
            Image::make($file)->save(base_path() . '/storage/c21/images/recruits/' . $name);
            $recruit->profile_img = url('img/recruits/' . $name);
            $recruit->save();
            Flash::success("Profile Image Was Updated");
            return redirect('admin/recruiting' . '/' . Input::get('recruit_id'));

        }
        Flash::error("Profile Was Not Updated");
        return redirect('admin/recruiting' . '/' . Input::get('recruit_id'));

    }


    public function update(Request $request)
    {
        $name = $request->input('name');
        $value = $request->input('value');
        $recruit = Recruits::where('id',$request->input('pk'))->first();
        $recruit->$name = $value;
        $recruit->save();

        return $value;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $recruit = Recruits::where('id',$id)->first();
        $recruit->delete();
        Flash::message('Recruit Was deleted');
    }

    /**
     * Imports a file from csv and returns a collection
     *
     * Reformats a phone number
     * @param RecruitImporter $importer
     * @internal param PhoneFormater $phone
     */
    public function upload(RecruitImporter $importer)
    {
        $importer->import();
    }
    public function create_recruit_note(Request $request,Note $note){
        $note->user_id = $request->input('user_id');
        $note->recruit_id = $request->input('recruit_id');
        $note->body = $request->input('note');
        $note->save();
        Flash::success("Your note was successfully added");
        return redirect('admin/recruiting/' . $request->input('recruit_id'));
    }
    public function assign_lead(Request $request){
        $recruit = Recruits::where('id', $request->input('recruit_id'))->first();
        $recruit->user_id = $request->input('user_id');
        $recruit->save();
        $user = User::find($request->input('user_id'));
        //Fire recruit was reassigned event
        Mail::send('emails.recruit_reassigned',['recruit' => $recruit],function($message) use ($user){
            $message->to($user->email);
            $message->bcc('jdelise@c21scheetz.com');
            $message->subject('A recruit has been assigned to you');
        });
        Flash::success("Recruit was successfully reassigned");
        return redirect('admin/recruiting/' . $request->input('recruit_id'));
    }

}

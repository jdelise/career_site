<?php namespace App\Http\Controllers;

use App\Appointment;
use App\C21\Helpers\ImportHelper;
use App\C21\Helpers\PhoneFormater;
use App\C21\Reporting\Closed_Leads;
use App\C21\Reporting\Repo\ReportingRepo;
use App\C21\Users\User;
use App\Commands\UploadLeadsFile;
use App\Events\LeadFileWasAdded;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lead;
use App\PendingLead;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class LeadRouterController extends Controller {
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('leadrouter',['except'=>'update,getLeadAcceptanceTypes']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param ReportingRepo $reporting
     * @return Response
     */
    public function dashboard(ReportingRepo $reporting){
        $lead_sources = $reporting->leads_by_source();
        $leads = Lead::where('is_scrubbed',0)->paginate(10);
        $pending_leads = PendingLead::orderBy('est_closing_date','ASC')->get();
        return view('admin.leadrouter.dashboard',compact('leads','pending_leads','lead_sources'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $lead = Lead::find($id);
        $tasks = Task::where('lead_id',$id)->get();
        return view('admin.leadrouter.show_lead', compact('lead','tasks'));
	}

    public function getLeadAcceptanceTypes(){
        $types = Lead::select('lead_acceptance_type')->groupBy('lead_acceptance_type')->get();
        return $types;
    }
	public function edit($id)
	{
        $lead = Lead::find($id);
		$sources = Closed_Leads::select('lead_type')->groupBy('lead_type')->get();
        dd($lead);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     * @internal param int $id
     */
    public function update(Request $request)
    {
        $name = $request->input('name');
        $value = $request->input('value');
        $lead = Lead::find($request->input('pk'))->first();
        $lead->$name = $value;
        $lead->save();

        return $lead;
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
    public function upload(PhoneFormater $phone)
    {
            $file = storage_path('c21/all_leads.csv');
            $this->dispatch(new UploadLeadsFile($file));
            return redirect('admin/leadrouter/dashboard');
    }

}

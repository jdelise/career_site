<?php namespace App\Http\Controllers;

use App\Appointment;
use App\C21\Reporting\Repo\ReportingRepo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Recruits;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class ReportingController extends Controller {
    protected $reporting;


    public function __construct(ReportingRepo $reporting){

        $this->reporting = $reporting;
        $this->middleware('auth');
        $this->middleware('reporting');
    }
	public function dashboard(){
        return 'Reporting Dashboard';
    }
    public function getRecruitProduction($id){
        $recruit = Recruits::where('id', $id)->first();
        $numbers = $this->reporting->recruitNumbers($recruit->mls_id);
        $pastNumbers = $this->reporting->recruitPastNumbers($recruit->mls_id);
        return view('admin.recruits.production_show',compact('recruit','numbers','pastNumbers'));
    }
    public function leads_by_source(){
        $lead_sources = $this->reporting->leads_by_source();
        list($keys, $values) = array_divide($lead_sources);
        $leads = $this->reporting->setLeadsBySourceGroup();
        //dd($leads);
        return view('admin.leadrouter.all_leads_by_source', compact('leads','keys','values'));
    }
    public function closed_leads_by_source(){
        $data_sources = $this->reporting->closedLeadsBySource()->lists('label');
        $data_count = $this->reporting->closedLeadsBySource()->lists('data');
        $leads = $this->reporting->allClosedBySource();
        return view('admin.leadrouter.closed_leads_by_source', compact('leads','data_sources','data_count'));
    }
    public function pending_leads_by_source(){
        $data_sources = $this->reporting->pendingLeadsBySource()->lists('label');
        $data_count = $this->reporting->pendingLeadsBySource()->lists('data');
        $leads = $this->reporting->allPendingBySource();
        return view('admin.leadrouter.pending_leads_by_source', compact('leads','data_sources','data_count'));
    }
    public function appointment_by_date(){
        $appointments = $this->reporting->appointments_by_date();
        dd($appointments);

    }


}

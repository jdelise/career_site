<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 3/27/2015
 * Time: 12:25 PM
 */

namespace App\C21\Reporting\Repo;

use App\Appointment;
use App\C21\Reporting\Closed_Leads;

use App\C21\Reporting\ReportingInterface;
use App\Lead;
use App\PendingLead;
use App\RecruitListing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportingRepo
{
    protected $start;
    protected $end;
    protected $pastStart;
    protected $pastEnd;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->resolveDates($request);
        $this->inThePast($request);
    }
    public function recruitNumbers($mls_id){
        $numbers = [];
        $numbers['listings_taken'] = RecruitListing::whereBetween('OriginalEntryTimestamp', [$this->start, $this->end])
            ->where('ListAgentMLSID',$mls_id)
            ->get();
        $numbers['listings_sold'] = RecruitListing::whereBetween('CloseDate', [$this->start, $this->end])
            ->where('ListAgentMLSID',$mls_id)
            ->where('Status','Sold')
            ->get();
        $numbers['buyer_sides'] = RecruitListing::whereBetween('CloseDate', [$this->start, $this->end])
            ->where('SellingAgentMLSID',$mls_id)
            ->get();
        return $numbers;
    }
    public function recruitPastNumbers($mls_id){
        $numbers = [];
        $numbers['listings_taken'] = RecruitListing::whereBetween('OriginalEntryTimestamp', [$this->pastStart, $this->pastEnd])
            ->where('ListAgentMLSID',$mls_id)
            ->get();
        $numbers['listings_sold'] = RecruitListing::whereBetween('CloseDate', [$this->pastStart, $this->pastEnd])
            ->where('ListAgentMLSID',$mls_id)
            ->where('Status','Sold')
            ->get();
        $numbers['buyer_sides'] = RecruitListing::whereBetween('CloseDate', [$this->pastStart, $this->pastEnd])
            ->where('SellingAgentMLSID',$mls_id)
            ->get();
        return $numbers;
    }
    protected function resolveDates($request)
    {
        $start = urldecode($request->input('start_date'));
        $end = urldecode($request->input('end_date'));

        if (!isset($start) or $start == '') {
            $this->start = Carbon::now()->subMonths(12);
        } else {
            $this->start = Carbon::parse($start);
        }
        if (!isset($end) or $end == '') {
            $this->end = $this->end = Carbon::now();
        } else {
            $this->end = Carbon::parse($end);
        }


    }
    protected function inThePast($request){

            $this->pastStart = Carbon::parse($this->start)->subYear();
            $this->pastEnd = Carbon::parse($this->end)->subYear();

    }
    //Old lead router stuff MARK FOR DELETION
    public function closedLeadsBySource()
    {
        //echo $this->start;
        return Closed_Leads::whereBetween('date_closed', [$this->start, $this->end])->groupBy('label')->get([
            DB::raw('source as label'),
            DB::raw('count(*) as data')
        ]);
    }

    public function allClosedBySource()
    {
        return Closed_Leads::whereBetween('date_closed', [$this->start, $this->end])->groupBy('lead_source')->groupBy('type')->get([
            DB::raw('source as lead_source'),
            DB::raw('lead_type as type'),
            DB::raw('count(*) as count')
        ]);
    }

    public function setLeadsBySourceGroup()
    {
        return Lead::whereBetween('created_at', [$this->start, $this->end])
            ->where('source_name', 'like', '%Zillow%')
            ->orWhere('source_name', 'like', '%Realtor.com%')
            ->orWhere('source_name', 'like', '%Scheetz%')
            ->orWhere('source_name', 'like', '%Trulia%')
            ->orWhere('source_name', 'like', '%CENTURY21.com%')
            ->orWhere('source_name', 'like', '%VoicePad%')
            ->orWhere('source_name', 'like', '%Live Chat%')
            ->orWhere('source_name', 'like', '%Homefinder.com%')
            ->groupBy('lead_source')
            ->groupBy('lead_type')->get([
                DB::raw('source_name as lead_source'),
                DB::raw('lead_acceptance_type as lead_type'),
                DB::raw('count(*) as count')
            ]);
    }

    public function pendingLeadsBySource()
    {
        //echo $this->start;
        return PendingLead::groupBy('label')->get([
            DB::raw('source as label'),
            DB::raw('count(*) as data')
        ]);
    }

    public function allPendingBySource()
    {
        return PendingLead::groupBy('lead_source')->groupBy('type')->get([
            DB::raw('source as lead_source'),
            DB::raw('lead_type as type'),
            DB::raw('count(*) as count')
        ]);
    }

    public function appointments_by_date()
    {
        $result = Appointment::whereBetween('appointment_date', [$this->start, $this->end])->with('lead')->get();
        return $result;
    }

    public function leadsBySource()
    {

    }

    public function leads_by_source()
    {
        $lead_sources = [];
        $lead_sources['Zillow'] = $this->setLeadsBySource('Zillow')->count();
        $lead_sources['Realtor.com'] = $this->setLeadsBySource('Realtor.com')->count();
        $lead_sources['Scheetz'] = $this->setLeadsBySource('Scheetz')->count();
        $lead_sources['C21'] = $this->setLeadsBySource('CENTURY21.com')->count();
        $lead_sources['Truila'] = $this->setLeadsBySource('Trulia')->count();
        $lead_sources['VoicePad'] = $this->setLeadsBySource('VoicePad')->count();
        $lead_sources['LiveChat'] = $this->setLeadsBySource('Live Chat')->count();
        $lead_sources['HomeFinder'] = $this->setLeadsBySource('Homefinder.com')->count();
        return $lead_sources;
    }

    /**
     * @param $name
     * @return
     * @internal param $request
     */
    function setLeadsBySource($name)
    {
        $lead = Lead::select('source_name', 'lead_acceptance_type')
            ->whereBetween('created_at', [$this->start, $this->end])
            ->where('source_name', 'like', '%' . $name . '%')->get();
        return $lead;
    }


}
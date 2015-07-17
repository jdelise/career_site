<?php namespace App\Http\Controllers;

use App\Appointment;
use App\C21\Reporting\Closed_Leads;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lead;
use App\PendingLead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class UploadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.uploads.test');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Input::hasFile('file')){
            $file = Input::file('file');
            Excel::load($file,function($reader){
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach($results as $result){
                    $args =[
                        'date_closed' => Carbon::parse($result->date_closed),
                        'office_id' => $result->office,
                        'lead_id' => $result->lead_id,
                        'tr_number' => $result->tr,
                        'blc_inquired' => $result->blc_inquired,
                        'blc_closed' => $result->blc_closed,
                        'address' => $result->address,
                        'lead_type' => $result->lead_type,
                        'listing_agent' => $result->lag,
                        'source' => $result->source,
                        'referral_fee' => $result->referral_fee,
                        'base_paid' => $result->base_paid,
                        'bcf' => $result->bcf,
                        'total_volume' => $result->total_volume,
                        'agent' => $result->agent
                    ];
                    Closed_Leads::create($args);
                    var_dump($result);

                }
            });
        }
	}
    public function importPendings()
    {
        if(Input::hasFile('file')){
            $file = Input::file('file');
            Excel::load($file,function($reader){
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach($results as $result){
                    $args =[
                        'est_closing_date' => Carbon::parse($result->est_closed_date),
                        'office_id' => $result->office,
                        'lead_id' => $result->lead_id,
                        'tr_number' => $result->tr,
                        'blc_inquired' => $result->blc_inquired,
                        'blc_pending' => $result->blc_closed,
                        'address' => $result->address,
                        'lead_type' => $result->lead_type,
                        'listing_agent' => $result->lag,
                        'source' => $result->source,
                        'referral_fee' => $result->referral_fee,
                        'base_paid' => $result->base_paid,
                        'bcf' => $result->bcf,
                        'total_volume' => $result->total_volume,
                        'agent_id' => $result->agent,

                    ];
                    PendingLead::updateOrCreate(['lead_id' => $result->lead_id],$args);
                    var_dump($result);

                }
            });
        }
    }
    public function importAppointments()
    {
        if(Input::hasFile('file')){
            $file = Input::file('file');
            Appointment::truncate();
            Excel::load($file,function($reader){
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach($results as $result){
                    $args =[
                        'user_id' => 2,
                        'lead_id' => $result->lead_id,
                        'agent_id' => NULL,
                        'appointment_confirmed' => $result->confirmed,
                        'appointment_date' => Carbon::parse($result->appointment_set_date)
                    ];
                    Appointment::create($args);
                    $lead = Lead::find($result->lead_id);
                    if($lead){
                        $lead->lead_acceptance_type = $result->dta;
                        $lead->save();
                    }
                    var_dump($result);

                }
            });
        }
    }
public function importLeads(){
    $file = Input::file('file');
    Excel::load(storage_path() . '/c21/total_leads.xlsx',function($reader){
        $reader->get();
        $reader->each(function($row){
            echo $row->date_entered->diffForHumans();
            var_dump($row);
        });



    });
}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

}

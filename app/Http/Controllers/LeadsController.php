<?php namespace App\Http\Controllers;

use App\C21\AddLeadToCrm;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lead;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class LeadsController extends Controller {

	/**
	*Implements Middleware Protection
     *only admin and recruiters can
     *access this controller
	*/
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('recruiting');
    }
	public function index()
	{
		return view('admin.leads.index');
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
		$lead = Lead::with('user')->where('id',$id)->first();
        return view('admin.leads.show_lead',compact('lead'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $statuses = Status::lists('status');
        $lead = Lead::with('user')->where('id',$id)->first();
        return view('admin.leads.edit_lead',compact('lead','statuses'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Lead::updateOrCreate(['id' => $id],Input::all());
        return redirect('admin/leads' . '/'. $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
       $delete = Input::get('confirm_delete');
        if(!isset($delete)){
            Flash::error('You must confirm deletion');
            return back()->withInput();
        }
        if($delete !== 'DELETE'){
            Flash::error('You must confirm deletion');
            return back()->withInput();
           // return redirect('/admin/leads' . '/' . $id);
        }

		$lead = Lead::find($id);
        $lead->delete();
        Flash::success('Lead has been deleted');
        return redirect('/admin/leads');
	}
    public function reassignLead($id){
        $lead = Lead::find($id);
        if(!$lead){
            Flash::error('That lead was not found');
            return back()->withInput();
        }
        $lead->user_id = Input::get('user_id');
        $lead->save();
        Flash::success('Lead was reassigned');
        return back()->withInput();
    }
    public function addLeadToCrm($id,AddLeadToCrm $addLeadToCrm){
        $lead = Lead::find($id);
        $added = $addLeadToCrm->addLeadToCrm($lead);
        if($added == false){
            Flash::error('Something went wrong. Please contact the admin');
            return back()->withInput();
        }
        Flash::success('The lead was synced successfully and deleted');
        $lead->delete();
        return redirect('admin/leads');
    }

}

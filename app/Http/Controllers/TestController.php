<?php namespace App\Http\Controllers;

use App\C21\Helpers\ImportHelper;
use App\C21\Helpers\PhoneFormater;
use App\C21\Reporting\Repo\ReportingRepo;
use App\Http\Requests;
use App\Recruits;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller {
    public function getTestHome(){
        return 'Test home';
    }
    public function getSubdomain(Request $request){
        return $request->getHost();
    }
    public function getDate(){
        return Carbon::now()->firstOfMonth();
    }
    public function pdf(ReportingRepo $reporting){

        $leads = $reporting->allClosedBySource();
        Mail::send('emails.weekly_closed_leads', compact('leads'), function($message)
        {
            $message->to('jdelise@c21scheetz.com', 'Joe Delise')->cc('ecrespo@c21scheetz.com','Emily Crespo')->subject('Closed Leads Report');
        });
    }
    /**
     *
     * @param ImportHelper $import
     *
     * Imports a file from csv and returns a collection
     *
     * Reformats a phone number
     * @param PhoneFormater $phone
     */
    public function readElements(ImportHelper $import, PhoneFormater $phone)
    {
        $recruits = $import->readElements();
        Recruits::truncate();
        foreach($recruits as $recruit){

            Recruits::create([
                'first_name' => ucwords($recruit->FirstName),
                'last_name' => ucwords($recruit->LastName),
                'phone' => $phone->format($recruit->Phone1),
                'address' => $recruit->Address1,
                'city' => $recruit->City,
                'zip_code' => $recruit->Zip,
                'email' => $recruit->Email,
                'status' => $recruit->ContactType,
                'assigned_to' => Auth::user()->id,
                'source' => $recruit->LeadSource
            ]);
        }
    }

}

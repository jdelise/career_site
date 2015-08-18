<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mail\MailRepo;
use App\Survey;
use App\Survey\SurveyRepo;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class SurveyController extends Controller {
    /**
     * @var SurveyRepo
     */
    private $repo;

    public function __construct(SurveyRepo $repo)
    {
        $this->middleware('auth');
        $this->repo = $repo;
    }
    public function index(){
        $surveys = $this->repo->getSurveys();
        return view('admin.surveys.all',compact('surveys'));
    }
	public function show($id){
        $survey = Survey::find($id);
        return view('admin.surveys.show',compact('survey'));
    }
    public function resend($id){
        $survey = $this->repo->resendSurvey($id);
        if($survey){
            Flash::success('Survey was resent!');
        }else{
            Flash::error('Something went wrong. Please contact Joe Delise');
        }
        return redirect()->back();
    }

    public function complete_survey_request($id){
        $survey = $this->repo->getSurvey($id);
        if($survey->completed == true){
            return view('admin.surveys.sorry');
        }
        return view('admin.surveys.complete_survey',compact('survey'));
    }
    public function store(Request $request,MailRepo $mailRepo){
        $survey = Survey::where('id',$request->input('id'))->with('recruit')->first();

        $survey->updateOrCreate(['id' => $request->input('id')],$request->all());
        $mailRepo->emailAdmin('Survey Complete','Survey was completed',[
                'Recruit Name' => $survey->recruit->first_name . ' ' .  $survey->recruit->last_name
            ]
        );
        return view('admin.surveys.thank_you');
    }

}

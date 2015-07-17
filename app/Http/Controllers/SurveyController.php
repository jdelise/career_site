<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Survey;
use App\Survey\SurveyRepo;
use Illuminate\Http\Request;

class SurveyController extends Controller {
    /**
     * @var SurveyRepo
     */
    private $repo;

    public function __construct(SurveyRepo $repo)
    {

        $this->repo = $repo;
    }
    public function index(){
        return $this->repo->generateSurvey(4,1);
    }
	public function show($id){

    }
    public function complete_survey_request($id){
        $survey = $this->repo->getSurvey($id);
        if($survey->completed == true){
            return view('admin.surveys.sorry');
        }
        return view('admin.surveys.complete_survey',compact('survey'));
    }
    public function store(Request $request){
        $survey = Survey::find($request->input('id'));

        $survey->updateOrCreate(['id' => $request->input('id')],$request->all());
        return view('admin.surveys.thank_you');
    }

}

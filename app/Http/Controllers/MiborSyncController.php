<?php namespace App\Http\Controllers;

use App\C21\Reporting\Repo\ReportingRepo;
use App\C21\Rets\Rets;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Recruits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class MiborSyncController extends Controller
{
    /**
     * @var Rets
     */
    private $rets;

    public function __construct(Rets $rets)
    {

        $this->rets = $rets;
        $this->middleware('auth');
        $this->middleware('recruiting',['except'=>'update']);
    }
    public function getSyncAgentPhoto($recruit_id)
    {
        $image = $this->rets->syncRecruitProfileImage($recruit_id);
        if ($image == false) {
            Flash::error('This recruit does not have an image on Mibor');
            return redirect('admin/recruiting' . '/' . $recruit_id);
        }
        Flash::success('The image sync was successful!');
        return redirect('admin/recruiting' . '/' . $recruit_id);
    }
    public function getDailyMiborSync(){
        $agents = Recruits::select(['id','mls_id','updated_at'])->where('synced',1)->get();
        foreach($agents as $agent){
            $this->rets->getRecruitListings($agent->mls_id, $agent->id,$agent->updated_at->format('Y-m-d\TH:i:s'));
        }
        return $agents;
    }
    public function getSyncAgentProduction($recruit_id, $mls_id)
    {
        $this->rets->getRecruitListings($mls_id, $recruit_id);
        Flash::success('The Production sync was successful!');
        return redirect('admin/recruiting' . '/' . $recruit_id);
    }
    public function getAgentSearch(){
        return view('admin.search.mibor_agent_search');
    }
    public function postAgentSearchResults(Request $request){
        $agentName = $request->input('agent_name');
        $agents = $this->rets->agentSearch($agentName);
        return $agents;
    }
    public function getShowMiborAgent($agent_id){
        $recruit = $this->rets->getAgentFromMls($agent_id);
        //return $recruit;
        $numbers = $this->rets->getAgentListings($agent_id);
        return view('admin.search.agent_show',compact('recruit','numbers'));
    }
    public function getAddMiborAgentToCrm($agent_id){
        $agent = $this->rets->getAgentFromMls($agent_id);
        $args = [
            'mls_id' => $agent['MLSID'],
            'first_name' => $agent['FirstName'],
            'last_name' => $agent['LastName'],
            'address' => $agent['StreetAddress'],
            'city' => $agent['StreetCity'],
            'state' => 'IN',
            'zip_code' => $agent['StreetPostalCode'],
            'email' => $agent['Email'],
            'phone_1' => $agent['CellPhone'],
            'phone_1_type' => 'Cell Phone',
            'phone_2' => $agent['HomePhone'],
            'phone_2_type' => 'Home',
            'user_id' => Auth::User()->id,
            'brokerage_code' => $agent['OfficeMLSID'],
            'experience_level' => 'Experienced Agent'

        ];
        $recruit = Recruits::create($args);
        $this->rets->getRecruitListings($agent_id, $recruit->id);
        Flash::success('This agent has been synced and added to your database!');
        return redirect('admin/recruiting' . '/' . $recruit->id);
    }


}

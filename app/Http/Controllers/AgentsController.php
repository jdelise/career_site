<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 8/12/2015
 * Time: 8:50 AM
 */

namespace App\Http\Controllers;


use App\AgentData;
use App\Agents;
use Illuminate\Http\Request;

class AgentsController extends Controller {
    public function __construct()
    {
        $this->middleware('auth',['except'=>'patchEditAgent']);
    }
    public function getIndex(){
        $agents = Agents::orderBy('last_name')->get();
        return view('admin.agents.show_all',compact('agents'));
    }
    public function getShowAgent($id){
        $agent = Agents::where('id',$id)->with('agentData')->first();
        $extra_data = AgentData::getAgentDataGrouped($id);
        return view('admin.agents.agent_view',compact('agent','extra_data'));
    }
    public function patchEditAgent(Request $request){
        $name = $request->input('name');
        $value = $request->input('value');
        $agent = Agents::where('id',$request->input('pk'))->first();
        $agent->$name = $value;
        $agent->save();

        return $value;
    }
}
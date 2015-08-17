<?php namespace App\Http\Controllers;

use App\C21\Rets\Rets;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RetsController extends Controller {
    /**
     * @var Rets
     */
    private $rets;

    /**
     * Display a listing of the resource.
     *
     * @param Rets $rets
     * @return Response
     */
    public function __construct(Rets $rets)
    {

        $this->rets = $rets;
    }
    public function office_production(){
        $listings = $this->rets->runOfficeProductionQuery();
        return view('frontend.rets.production_report',compact('listings'));
    }
	public function buyerQuery($office = '|CESC01,CESC02,CESC03,CESC04,CESC05,CESC07',$start = 1,$end = 1)
	{
        //return $this->rets->runOfficeQuery();
		return $this->rets->runBuyingQuery($office,$start,$end);
	}
    public function sellerQuery($office = '|CESC01,CESC02,CESC03,CESC04,CESC05,CESC07',$start = 1,$end = 1)
    {
        return $this->rets->runListingQuery($office,$start,$end);
    }
    public function test($agent_id,$start_range,$end_range)
    {
        dd($this->rets->runAgentQuery($agent_id,$start_range,$end_range));
    }

}

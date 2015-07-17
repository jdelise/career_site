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
	public function buyerQuery()
	{
        return $this->rets->runOfficeQuery();
		//return $rets->runBuyingQuery(186);
	}
    public function sellerQuery()
    {
        return $this->rets->runListingQuery(186);
    }
    public function test($agent_id,$start_range,$end_range)
    {
        dd($this->rets->runAgentQuery($agent_id,$start_range,$end_range));
    }

}

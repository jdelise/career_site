<?php namespace App\Http\Controllers;

use App\Commands\BusinessPlanCreated;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AjaxController extends Controller {

    function business_plan_submit(Request $request){

        $goal_amount = $request->input('goal_amount');
        $goal_amount = preg_replace('/[^0-9]/','',$goal_amount);
        $sales_price = $request->input('sales_price');
        $sales_price = preg_replace('/[^0-9]/','',$sales_price);
        $commission = '3';
        $commission = ($commission / 100);
        $math = $this->_math($goal_amount,$sales_price,$commission);
        $this->dispatch(new BusinessPlanCreated($request));
        return $math;
    }
    function _math($goal_amount, $sales_price = '200000', $commission = '.030'){
        $data = array();
        $base = '19200';
        // This is based on a 6% franchise fee
        $fee = '.94';
        $adjusted_goal = $goal_amount / $fee;
        $total_owed = $adjusted_goal + '19200';

        $com = $sales_price * $commission;
        //echo $com;
        $number_of_deals =  $total_owed / $com;

        $final_number_of_deals =  round($number_of_deals,2);

        $list_percent = round(($final_number_of_deals * '.60'),2);
        $buy_percent = round(($final_number_of_deals * '.40'),2);

        $data['goal_amount'] = number_format($goal_amount);
        $data['average_sales_price'] = number_format($sales_price);
        $data['average_commission'] = number_format($com);
        $data['total_tranactions'] = $final_number_of_deals;
        $data['listings_taken'] = round(($list_percent / '.70'));
        $data['buyers_taken'] = round(($buy_percent / '.85'));
        $data['buyers_closed'] = $buy_percent;
        $data['listings_closed'] = $list_percent;
        return $data;
    }
}

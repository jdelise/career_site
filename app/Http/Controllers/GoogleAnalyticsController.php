<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use LaravelAnalytics;

class GoogleAnalyticsController extends Controller {

	//
    public function page_views($days){
        $data = LaravelAnalytics::getVisitorsAndPageViews($days, 'yearMonth');
      // dd($data);
        $dates = $this->change_dates($data->lists('yearMonth'));
        $visitors = $data->lists('visitors');
        return view('admin.google.page_views',compact('dates','visitors'));
    }
    protected function change_dates($dates){
        $new_dates = [];
            foreach($dates as $date){
                array_push($new_dates, $date->format('F Y'));
            }
        return $new_dates;
    }
}

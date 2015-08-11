<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/**
*Front End Routes
 *
 *
 *
*/

Route::get('/', 'PagesController@home');
Route::get('licensing', 'PagesController@licensing');
Route::get('career_assessment', 'PagesController@personality_assessment');
Route::get('business_plan', 'PagesController@business_plan');
Route::get('business_plan.php', 'PagesController@business_plan');
Route::get('about_us/culture', 'PagesController@culture');
Route::get('about_us/agent_support', 'PagesController@agent_support');
Route::get('testimonials', 'PagesController@testimonials');
Route::get('contact_us', 'PagesController@contact_us');
Route::post('contact_us', 'PagesController@contact_us_send');
Route::get('training', 'PagesController@training');
Route::get('technology', 'PagesController@technology');
Route::get('top_5_reasons', 'PagesController@top_five_reasons');
Route::post('top_5_reasons', 'PagesController@top_five_reasons_submit');
Route::get('licensing', 'PagesController@licensing');
Route::post('front_ajax/business_plan_submit','AjaxController@business_plan_submit');

/**
*Admin Area
 *
 *
*/
Route::get('admin','AdminController@index');
Route::get('admin/admin-dashboard','AdminController@adminDashboard');
Route::get('admin/leadrouter/dashboard',[
    'as' => 'leadrouter_dashboard',
    'uses' => 'LeadRouterController@dashboard']
);
Route::patch('admin/leadrouter','LeadRouterController@update');
Route::post('admin/leadrouter/getLeadAcceptanceTypes','LeadRouterController@getLeadAcceptanceTypes');
Route::get('admin/leadrouter/import','LeadRouterController@upload');
Route::resource('admin/leadrouter','LeadRouterController');
/**
*Leads
*/
Route::match(['get','post'],'admin/leads/add_lead_to_crm/{id}','LeadsController@addLeadToCrm');
Route::match(['get','post'],'admin/leads/reassign_lead/{id}','LeadsController@reassignLead');
Route::resource('admin/leads','LeadsController');
/**
*Users
 *
 *
*/

Route::controller('admin/users','UsersController');
/**
*
*/
Route::post('admin/task/create_task','TaskController@createTask');
/**
*Recruiting
 *
 *
*/

Route::get('admin/complete_task','TaskController@completeTask');
Route::get('admin/all_surveys','SurveyController@index');
Route::get('admin/survey/show/{id}','SurveyController@show');
Route::get('admin/survey/resend/{id}','SurveyController@resend');
Route::get('admin/complete_survey_request/{id}','SurveyController@complete_survey_request');
Route::patch('admin/recruiting','RecruitsController@update');
Route::post('admin/create_note','RecruitsController@create_recruit_note');
Route::post('admin/reassign_lead','RecruitsController@assign_lead');
Route::get('admin/recruiting/dashboard','RecruitsController@dashboard');
Route::get('admin/recruiting/all_recruits','RecruitsController@index');
Route::get('admin/recruiting/create_recruit','RecruitsController@create');
Route::post('admin/recruiting/add_recruit','RecruitsController@store');
Route::get('admin/recruiting/import','RecruitsController@upload');
Route::get('admin/task/add_to_outlook','TaskController@addTaskToOutlook');
Route::post('admin/recruiting/update_profile_img','RecruitsController@edit_img');
Route::controller('test','TestController');
Route::controller('admin/admin_ajax','AdminAjaxController');
Route::controller( 'admin/mibor_sync','MiborSyncController');
Route::controller('aws','AwsController');
Route::get('admin/recruiting/{id}',[
    'as' => 'show_recruit',
    'uses' => 'RecruitsController@show'
]);
/**
*Reporting
 *
*/
Route::controller('admin/reporting','ReportingController');

Route::post('admin/survey/save','SurveyController@store');
/**
*Uploading
 *
 *
*/
Route::get('admin/uploads', 'UploadController@create');
Route::post('admin/uploads', 'UploadController@store');
Route::post('admin/uploads/import_pendings','UploadController@importPendings');
Route::post('admin/uploads/import_appointments','UploadController@importAppointments');
Route::post('uploads/upload_leads', 'UploadController@importLeads');
/**
*Text Messaging
 *
 *
*/
Route::get('admin/create_text_message', ['as' => 'text_message', 'uses'=>'TextMessagingController@index']);
Route::post('admin/check_message_then_send', 'TextMessagingController@check_message_then_send');
Route::post('admin/send_message', 'TextMessagingController@sendMessage');
Route::post('admin/send_text_to_zipcode', 'TextMessagingController@sendToZipcode');
Route::get('admin/send_text_to_zipcode', 'TextMessagingController@sendToZipcode');
/**
* @TODO
 *Will want to change this to post
 *
*/
Route::get('lead_twillio_request','TextMessagingController@incomingAppointmentRequest');
/**
*Mail Controller
 *
 *
*/
Route::get('admin/mail','MailController@getMail');
Route::post('message_transport',function(){

});
Route::get('mailgun_route',function(){
   $mg = new \App\Mail\MailGunRepo();
    $new_route = $mg->createRoute();
     dd($new_route);
});
/**
*Auth Control
 *
*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

//Tests
Route::get('admin/mibor_buyers', 'RetsController@buyerQuery');
Route::get('admin/mibor_sellers', 'RetsController@sellerQuery');
Route::get('admin/mibor_test/{agent_id}/{start_range}/{end_range}', 'RetsController@test');
Route::get('test',function(){
   // $user = \App\C21\Users\User::where('id',1)->with('groups')->first();
    //dd($user->groups[0]->name);
    return view('emails.email_1');
});
Route::get('admin/ftp',function(){
    $listing = FTP::connection()->downloadFile('Agents.xml',storage_path() . '/c21/Agents.xml');
    if($listing === true){
        return redirect('admin/agents_go');
    }
    die('The file failed for some reason');
});
Route::get('webvideos/{video}',function($video){
    $random = rand(1,1);

    $video_path = base_path('public/videos'). '/folder_' . $random . '/' . $video;
    $stream = new \App\Videos\VideoStream($video_path);
    $stream->start();
});
Route::get('video',function(){
    return view('tests/video');
});
Route::get('admin/agents_go',function(){
     $file = Storage::get('Agents.xml');
    $xml = simplexml_load_string($file);
    //dd($xml->agent[4]);
    \App\Agents::truncate();
    $i = 1;
    $mobile = '';
     foreach($xml->agent as $agent){
         if($agent->phone_one_name == 'Cell'){
            $mobile = $agent->phone_one;
         }
         if($agent->phone_two_name == 'Cell'){
             $mobile = $agent->phone_two;
         }
         \App\Agents::updateOrCreate(['id' => $agent->agent_id],[
             'id' => $agent->agent_id,
             'first_name' => $agent->first_name,
             'last_name' => $agent->last_name,
             'agent_full_name' => $agent->last_name . ', ' .$agent->first_name,
             'email_address' => $agent->email,
             'mobile_phone' => $mobile,
             'office_phone' => $agent->phone_one,
             'office' => $agent->address1,
             'agent_order' => $i
         ]);
         $i++;
     }
    return redirect('admin');
});
// Helper routes
/**
*Image manipulation
*/
Route::get('img/{path}',function(League\Glide\Server $server, \Illuminate\Http\Request $request){
    $server->outputImage($request);
})->where('path','.*');
/**
*
*/
Route::get('roles',function(){
    return \App\C21\Users\Acl\Role::all();
});
/**
*
*/
Route::get('permissions',function(){
    return \App\C21\Users\Acl\Permission::all();
});
/**
*
*/
Route::get('phpinfo',function(){
    phpinfo();
});
Route::get('admin/pdf','TestController@pdf');
Route::get('mail/test',function(){
   return view('emails.lead_file_uploaded');
});
Route::get('api',function(){
    $username = 'c21scheetzjoe';
    $password = 'Ife91eu1iIdfud';
    $url = 'https://qa.api.erelocation.net/default.asmx/GetAgents';
    $client = new \GuzzleHttp\Client();
    $response = $client->post($url,[
        'auth'    => [$username, $password],
        'body'    => [
            'ThirdPartyID' => '',
            'ChangedSinceUTC'=>'',
            'OfficeID' => '',
            'OnlyShowActive' =>'True',
            'IncludeAgentProfile' =>'',
            'ProductionIncludesExcludedSources' => '',
            'ProductionIncludesNonExcludedSources' => ''
        ]
    ]);
    $xml = $response->xml();
    dd($xml);
});



<?php namespace App\Commands;

use App\C21\Users\User;
use App\Commands\Command;

use App\Lead;
use App\Mail\MailRepo;
use App\Recruits;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class BusinessPlanCreated extends Command implements SelfHandling {
    /**
     * @var Request
     */
    private $request;

    /**
     * Create a new command instance.
     *
     * @param Request $request
     */
	public function __construct(Request $request)
	{
		//
        $this->request = $request;
    }

    /**
     * Execute the command.
     *
     * @param Lead $lead
     * @internal param Recruits $recruits
     * @internal param Recruits $recruit
     */
	public function handle(Lead $lead, MailRepo $mailRepo)
	{
        if(Session::get('sub') != env('APP_NAME')){
            $user = User::where('short_name',Session::get('sub'))->first();

        }else {
            $user = User::where('email', Config::get('c21.recruiter.email'))->first();
        }
       // dd($user->id);
        $args = [
            'email' =>  $this->request->input('email'),
            'first_name' =>  $this->request->input('first_name'),
            'last_name' =>  $this->request->input('last_name'),
            'user_id' => $user->id,
            'source' => 'C21 Career Site Business Plan',
            'phone_1' => $this->request->input('phone'),
            'experience_level' => $this->request->input('license_status'),
            'real_estate_school' => $this->request->input('school'),
            'brokerage_name' => $this->request->input('brokerage')
        ];
        $new_lead = $lead->updateOrCreate(['email' => $this->request->input('email')],$args);
        $mailRepo->sendBusinessPlan($args,$new_lead,$user);
	}

}

<?php namespace App\Commands;

use App\Commands\Command;

use App\Lead;
use App\Recruits;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
	public function handle(Lead $lead)
	{
        $args = [
            'email' =>  $this->request->input('email'),
            'first_name' =>  $this->request->input('first_name'),
            'last_name' =>  $this->request->input('last_name'),
            'source' => 'C21 Career Site Business Plan',
            'phone' => $this->request->input('phone'),
            'experience_level' => $this->request->input('license_status'),
            'real_estate_school' => $this->request->input('school'),
            'brokerage_name' => $this->request->input('brokerage')
        ];
        $new_lead = $lead->updateOrCreate(['email' => $this->request->input('email')],$args);
        Mail::send('emails.new_business_plan',['args' => $args],function($message) use ($new_lead){
            $message->subject($new_lead->first_name . ' ' . $new_lead->last_name . ' has filled out a new business plan.');
            $message->cc('jdelise@c21scheetz.com');
            $message->to('jshort@c21scheetz.com');
            //$message->cc('pbender@c21scheetz.com');
        });
	}

}

<?php namespace App\Handlers\Events;

use App\Events\JobWasPosted;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Mail;

class EmailConfirmation {

	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  JobWasPosted  $event
	 * @return void
	 */
	public function handle(JobWasPosted $event)
	{
        //dd($event->jobs->title);
        Mail::raw('My message to ' . $event->jobs->title,function($message){
            $message->from('information@c21scheetz.com', 'C21 Scheetz');
            $message->to('joedelise@gmail.com');
        });
	}

}

<?php namespace App\Handlers\Events;

use App\Events\AppointmentWasAssigned;

use App\Events\LeadFileWasAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Mail;

class EmailUser implements ShouldBeQueued{

    /**
     * Create the event handler.
     *
     */
	public function __construct()
	{
		//
	}

    /**
     * Handle the event.
     *
     * @param AppointmentWasAssigned|LeadFileWasAdded $event
     */
	public function handle(LeadFileWasAdded $event)
	{
        Mail::send('emails.lead_file_uploaded',['first_name' => $event->user->first_name],function($message) use ($event){
            $message->from('information@c21scheetz.com', 'C21 Scheetz');
            $message->subject('Your file has benn uploaded and cleaned');
            $message->to($event->user->email);
        });
	}

}

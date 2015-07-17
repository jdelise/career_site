<?php namespace App\Handlers\Events;

use App\Events\LeadWasReassigned;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EmailUserAboutChange {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  LeadWasReassigned  $event
	 * @return void
	 */
	public function handle(LeadWasReassigned $event)
	{
		//
	}

}

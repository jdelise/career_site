<?php namespace App\Handlers\Events;

use App\Events\TaskWasAssignedToUser;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Mail;

class EmailUserAboutTaskChange {

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
	 * @param  TaskWasAssignedToUser  $event
	 * @return void
	 */
	public function handle(TaskWasAssignedToUser $event)
	{
		//
	}

}

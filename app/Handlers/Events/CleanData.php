<?php namespace App\Handlers\Events;

use App\C21\Helpers\DatabaseCleaner;
use App\Events\LeadFileWasAdded;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class CleanData implements ShouldBeQueued{

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
     * @param  LeadFileWasAdded $event
     * @param DatabaseCleaner $cleaner
     */
	public function handle(LeadFileWasAdded $event)
	{
        $cleaner = new DatabaseCleaner();
		$cleaner->updateLeadDatabase();
	}

}

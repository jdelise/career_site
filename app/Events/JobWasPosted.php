<?php namespace App\Events;

use App\Events\Event;

use App\Jobs;
use Illuminate\Queue\SerializesModels;

class JobWasPosted extends Event {

	use SerializesModels;
    /**
     * @var Jobs
     */
    public $jobs;

    /**
     * Create a new event instance.
     *
     * @param Jobs $jobs
     */
	public function __construct(Jobs $jobs)
	{
		//
        $this->jobs = $jobs;
    }

}

<?php namespace App\Events;

use App\Agents;
use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class AppointmentWasAssigned extends Event {

	use SerializesModels;
    /**
     * @var Agents
     */
    public $agent;

    /**
     * Create a new event instance.
     *
     * @param Agents $agent
     */
	public function __construct(Agents $agent)
	{
		//
        $this->agent = $agent;
    }

}

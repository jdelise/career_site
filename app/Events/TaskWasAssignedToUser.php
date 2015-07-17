<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class TaskWasAssignedToUser extends Event {

	use SerializesModels;
    /**
     * @var
     */
    public $task;
    /**
     * @var
     */
    public $currentUserEmail;

    /**
     * Create a new event instance.
     *
     * @param $task
     * @param $currentUserEmail
     */
	public function __construct($task, $currentUserEmail)
	{
		//
        $this->task = $task;
        $this->currentUserEmail = $currentUserEmail;
    }

}

<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class ContactUsSubmit extends Event {

	use SerializesModels;
    /**
     * @var array
     */
    public $request;

    /**
     * Create a new event instance.
     *
     * @param $request
     */
	public function __construct($request)
	{
		//
        $this->request = $request;
    }

}

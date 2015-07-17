<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;
use Symfony\Component\Security\Core\User\User;

class LeadFileWasAdded extends Event {

	use SerializesModels;
    /**
     * @var User
     */
    public $user;


    /**
     * Create a new event instance.
     *
     * @param $user_id
     * @internal param User $user
     */
	public function __construct($user_id)
	{

        $this->user = \App\C21\Users\User::find($user_id)->first();

    }

}

<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
        'App\Events\JobWasPosted' => [
            'App\Handlers\Events\EmailConfirmation'
        ],
        'App\Events\AppointmentWasAssigned' => [
            'App\Handlers\Events\EmailUser',
            'App\Handlers\Events\EmailAdmin'
        ],
        'App\Events\LeadFileWasAdded' => [
            'App\Handlers\Events\CleanData',
            'App\Handlers\Events\EmailUser'
        ],
        'App\Events\LeadWasReassigned' => [
            'App\Handlers\Events\EmailUserAboutChange'
        ],
        'App\Events\TaskWasAssignedToUser' => [
            'App\Handlers\Events\EmailUserAboutTaskChange'
        ],
        'App\Events\ContactUsSubmit' => [
            'App\Handlers\Events\EmailAdmin'
        ]
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		//
	}

}

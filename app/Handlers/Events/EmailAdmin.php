<?php namespace App\Handlers\Events;

use App\Events\AppointmentWasAssigned;

use App\Events\ContactUsSubmit;
use App\Mail\MailRepo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Mail;

class EmailAdmin {
    /**
     * @var MailRepo
     */
    private $mailRepo;

    /**
     * Create the event handler.
     * @param MailRepo $mailRepo
     */
	public function __construct(MailRepo $mailRepo)
	{
		//
        $this->mailRepo = $mailRepo;
    }

    /**
     * Handle the event.
     *
     * @param AppointmentWasAssigned|ContactUsSubmit $event
     * @internal param MailRepo $mailRepo
     */
	public function handle(ContactUsSubmit $event)
	{
        //dd($event->request);
        $this->mailRepo->emailAdmin('Contact Us Request','C21 Careers Contact Us Form',[
                'name' => $event->request['name'],
                'phone' => $event->request['phone'],
                'email' => $event->request['email'],
                'subject' => $event->request['subject'],
                'comments' => $event->request['comments']
            ]
        );
	}

}

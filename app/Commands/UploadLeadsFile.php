<?php namespace App\Commands;

use App\C21\Helpers\ImportHelper;
use App\C21\Helpers\PhoneFormater;
use App\Commands\Command;

use App\Events\LeadFileWasAdded;
use App\Lead;
use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Auth;

class UploadLeadsFile extends Command implements SelfHandling, ShouldBeQueued {

	use InteractsWithQueue, SerializesModels;
    public $file;

    /**
     * Create a new command instance.
     *
     * @param $file
     */
	public function __construct($file)
	{
		$this->file = $file;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(Lead $leadrouter)
	{
        set_time_limit(400);
        $import = new ImportHelper($this->file);
        $phone = new PhoneFormater();
        $leads = $import->readElements();
        foreach ($leads as $lead) {

            $leadrouter->updateOrCreate(['id' => $lead->id],[
                'id' => $lead->id,
                'first_name' => ucwords($lead->first_name),
                'last_name' => ucwords($lead->last_name),
                'phone_1' => $phone->format($lead->phone1),
                'phone_2' => $phone->format($lead->phone2),
                'listing_address' => $lead->listing_address,
                'listing_city' => $lead->listing_city,
                'listing_zipcode' => $lead->listing_area_name,
                'listing_price' => $lead->listing_price,
                'email' => $lead->email,
                'status' => $lead->status,
                'is_scrubbed' => 0,
                'agent_crest_id' => $lead->agent_legacy_id,
                'source_name' => $lead->current_source,
                'created_at' => Carbon::parse($lead->date_entered),
                'updated_at' => Carbon::parse($lead->last_update_date_by_agent)
            ]);


        }
        event(new LeadFileWasAdded(Auth::user()->id));
	}

}

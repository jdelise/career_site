<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 3/30/2015
 * Time: 8:58 AM
 */

namespace App\C21\Messaging\Repo;

use App\AgentData;
use App\Agents;
use App\Appointment_Message;
use App\C21\Messaging\Repo\TextMessagingInterface;
use App\Zipcode;
use Illuminate\Support\Facades\DB;
use Services_Twilio;

class TwilioRepo implements TextMessagingInterface {

    /**
     * @var Services_Twilio
     */
    private $client;
    private $twilio_number;
    public function __construct(){
        $this->twilio_number = $_ENV['TWILIO_NUMBER'];
        $this->client = new Services_Twilio($_ENV['TWILIO_ACCOUNT_SID'], $_ENV['TWILIO_AUTH_TOKEN']);
    }

    public function sendTextMessage($number, $message){
        $message = $this->client->account->messages->sendMessage(
            $this->twilio_number,
            $number,
            $message
        );
        return $message;
    }

    public function sendToZipCode($inputs)
    {
        //Create a new text record
        $messageId = Appointment_Message::create([
            'lead_id' => $inputs['lead_id'],
            'responses' => 0,
            'zipcode' => $inputs['zipcode']
        ]);
        $zipcode = Zipcode::find($inputs['zipcode']);
        $agents = AgentData::where('zip', $inputs['zipcode'])->groupBy('agent_id')->get([
            DB::raw("agent_id,zip,agent_id, COUNT(CASE WHEN source IN ('S','B') THEN 1 END) as closings,COUNT(CASE WHEN source IN ('O') THEN 1 END) as office,COUNT(CASE WHEN source IN ('H') THEN 1 END) as home,COUNT(CASE WHEN source IN ('A') THEN 1 END) as other")
        ])->toArray();
        $array_pop = $this->filterAgentsForCollection($agents, $zipcode);
        $agent_collection = Agents::where('mobile_phone','!=','')->where('is_active',1)->where('days_red','<=',$zipcode->min_red)->orderBy('agent_order','ASC')->find($array_pop);
        $agent_collection->add([
            'messageId' => $messageId->id
        ]);
        return $agent_collection;
    }

    /**
     * @param $agents
     * @param $zipcode
     * @return array
     */
    protected function filterAgentsForCollection($agents, $zipcode)
    {
        foreach ($agents as $key => $value) {
            if ($value['closings'] >= $zipcode->min_closings) {
            } elseif ($value['office'] == 1) {
            } elseif ($value['home'] == 1) {
            } elseif ($value['other'] == 1) {
                //Should remove this check
            } else {
                unset($agents[$key]);
            }
        }
        $array_pop = array_pluck($agents, 'agent_id');
        return $array_pop;
    }
}
<?php namespace App\Http\Controllers;

use App\Agents;
use App\Appointment_Message;
use App\C21\Messaging\Repo\TextMessagingInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Event;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Events\AppointmentWasAssigned;

class TextMessagingController extends Controller
{

    /**
     * @var TextMessagingInterface
     */
    private $messaging;

    /**
     * @param TextMessagingInterface $messaging
     *
     * Do checks if user is auth and do they have permission to send text messages
     */
    public function __construct(TextMessagingInterface $messaging)
    {
        $this->messaging = $messaging;
        $this->middleware('auth',['except' => 'incomingAppointmentRequest']);
        $this->middleware('text',['except' => 'incomingAppointmentRequest']);
    }

    /**
     * Show the main Messaging Control Panel
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.messaging.create_message');
    }

    /**
     * @param Request $request
     * Basic text message send
     *
     * Returns a result
     * @return mixed
     */
    public function sendMessage(Request $request)
    {
        $input = $request->all();
        return $this->messaging->sendTextMessage($input['number'], $input['message']);
    }

    /**
     * @param Request $request
     * Check incoming message to see if that message has been accepted
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function check_message_then_send(Request $request)
    {
        $input = $request->all();
        $wasMessageAccepted = Appointment_Message::find($input['text']);
        if ($wasMessageAccepted->responses == 0) {
            return ($this->messaging->sendTextMessage($input['number'], $input['message']));
        }
        /*
         * Return a 401 response if the lead was accepted to stop ajax
         * */
        return response('Message Accepted.', 401);
    }

    /**
     * @param Request $request
     * Returns a collection of agents based on a zipcode
     * @return Request
     */
    public function sendToZipcode(Request $request)
    {

        $inputs = $request->all();
        $request = $this->messaging->sendToZipCode($inputs);
        return $request;


    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function incomingAppointmentRequest(Request $request){
        $inboundRequest = $request->all();
        $body = $inboundRequest['Body'];
        $from_phone = $inboundRequest['From'];
        $appointmentMessage = Appointment_Message::find($body);
        if(!$appointmentMessage){
            return response()->view('admin.messaging.responses.wrong_code')->header('Content-Type', 'text/xml');
        }
        $agent = Agents::where('mobile_phone',$from_phone)->with('messages')->first();
        $agent->messages()->attach($appointmentMessage->id);
        $zipcode = $appointmentMessage->zipcode;
        // No message exists, tell the user the wrong code was entered

        //Other wise, give the user feedback, fire an event and return xml to the user
        if($appointmentMessage->responses == 0){
            $appointmentMessage->responses = 1;
            $appointmentMessage->agent_id = $agent->id;
            $appointmentMessage->save();
            event(new AppointmentWasAssigned($agent));
            return response()->view('admin.messaging.responses.lead_accepted',compact('zipcode','from_phone'))->header('Content-Type','text/xml');
        }
        // Always assume failure and return the response
        return response()->view('admin.messaging.responses.lead_was_taken')->header('Content-Type','text/xml');

    }
}

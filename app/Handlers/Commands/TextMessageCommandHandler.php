<?php namespace App\Handlers\Commands;

use App\Commands\TextMessageCommand;

use App\Events\JobWasPosted;
use App\Jobs;
use Illuminate\Queue\InteractsWithQueue;

class TextMessageCommandHandler {

//    private $dispatcher;
//
//    public function __construct(EventDispatcher $dispatcher)
//    {
//
//        $this->dispatcher = $dispatcher;
//    }
    public function handle($command)
    {
        //dd($command);
        Jobs::post($command->title,$command->description);
        var_dump('Sending a text message');
    }

}

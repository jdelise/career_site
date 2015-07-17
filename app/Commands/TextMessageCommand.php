<?php namespace App\Commands;

use App\Commands\Command;

class TextMessageCommand extends Command{

    public $title;
    public $description;
    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

}

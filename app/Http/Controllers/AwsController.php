<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AwsController extends Controller {
    protected $aws;
    public function __construct()
    {
        $this->aws = App::make('aws')->get('s3');
	}
    public function getBucketList(){
        dd($this->aws->listBuckets());

    }

}

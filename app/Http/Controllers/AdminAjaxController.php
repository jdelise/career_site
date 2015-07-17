<?php namespace App\Http\Controllers;

use App\ExperienceLevel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Office;
use App\Source;
use App\Status;
use Illuminate\Http\Request;

class AdminAjaxController extends Controller {

	public function postSources(){
        return Source::all();
    }
    public function postStatus(){
        return Status::lists('status');
    }
    public function postOffices(){
        return Office::lists('name','id');
    }
    public function postExperienceLevel(){
        return ExperienceLevel::lists('level','id');
    }

}

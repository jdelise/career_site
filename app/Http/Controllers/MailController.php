<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MailController extends Controller {

	public function getMail(){
        return view('admin.mail.inbox');
    }

}

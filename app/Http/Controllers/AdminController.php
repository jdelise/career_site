<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        /*if(Auth::user()->can('can_view_dashboard')){
            return view('admin.pages.dashboard');
        }*/
        if(Auth::user()->can(['can_access_recruiting'])){
            return redirect('admin/recruiting/dashboard');
        }
        if(Auth::user()->can(['can_access_leadrouter'])){
            return redirect('admin/create_text_message');
        }

        return redirect('/');

    }
}

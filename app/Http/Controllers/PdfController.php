<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
class PdfController extends Controller {

	public function index(){
        if(isset($_GET['test'])){
            return view('pdf.test');
        }
        $pdf = PDF::loadView('pdf.test');
        return $pdf->stream('test.pdf');
    }

}

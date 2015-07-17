<?php namespace App\Http\Controllers;

use App\Events\ContactUsSubmit;
use App\ExperienceLevel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mail\MailRepo;
use App\RealEstateSchool;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;

class PagesController extends Controller
{
    protected $client;

    public function home(Client $client)
    {
        $this->client = $client;
        $request = $this->client->get('http://feeds.feedburner.com/inmannews');
        $feed = $request->xml();
        return view('frontend.pages.home', compact('feed'));
    }

    public function personality_assessment()
    {
        return view('frontend.pages.personality_assessment');
    }

    public function licensing()
    {
        return view('frontend.pages.licensing');
    }

    public function business_plan()
    {
        $license_status = ExperienceLevel::lists('level', 'id');
        $real_estate_schools = RealEstateSchool::lists('school_name', 'id');
        return view('frontend.pages.business_plan', compact('license_status', 'real_estate_schools'));
    }

    public function culture()
    {
        return view('frontend.pages.culture');
    }

    public function testimonials()
    {
        return view('frontend.pages.testimonials');
    }

    public function contact_us()
    {
        return view('frontend.pages.contact_us');
    }

    public function top_five_reasons()
    {
        return view('frontend.landing_pages.top_five_reasons');
    }

    public function top_five_reasons_submit(Requests\TopFiveReasons $request, MailRepo $mailRepo)
    {
        Mail::send('emails.email_2', [
            'name' => $request['full_name']
        ], function ($message) use ($request) {
            $message->subject('Your free career PDF');
            $message->to($request['email']);
            //$message->attach(storage_path('c21/career.pdf'));
            // $message->cc('pbender@c21scheetz.com');
            //$message->cc('jshort@c21scheetz.com');
        });
        $mailRepo->emailAdmin('Top 5 Reasons Request', 'Top 5 Reasons Request', [
                'name' => $request['full_name'],
                'email' => $request['email'],
                'phone' => $request['phone']
            ]
        );
        Flash::success("Your information has been received. Thank You!");
        return redirect('top_5_reasons');
    }

    public function tech_book()
    {
        return view('frontend.landing_pages.tech_book');
    }

    /**
     * @param Requests\ContactForm $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function contact_us_send(Requests\ContactForm $request)
    {
        event(new ContactUsSubmit($request));
        Flash::success("Your information has been received. Thank You!");
        return redirect('contact_us');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function training()
    {
        return view('frontend.pages.training');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function technology()
    {
        return view('frontend.pages.technology');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function agent_support()
    {
        return view('frontend.pages.agent_support');
    }

}

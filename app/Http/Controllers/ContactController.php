<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Session;
use App\Setting;

class ContactController extends Controller
{
     public function __construct()
    {
        $this->mail_function = new EmailController();
    } 
    public function index()
    {
//        $setting=Setting::where('id','1')->first();
//        return view('contact.create',compact('setting'));
    }
	
	  /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(Request $request)
    {   

        return view('contact.create');
    }
	
    public function store(Request $request)
    {

        $contact = new Contact;

        $contact->email = $request->input('email');
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->subject = $request->input('subject');

        if ($contact->save())
        {
            Session::flash('flash_message', 'Thank you for Contacting us.');
			$this->mail_function->sendMailContactAction($contact);
			 
        } else
        {
             Session::flash('flash_error', 'Something wrong! Try again.');
        }


        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use View;
use App\Setting;
class EmailController extends Controller
{
     public function sendMailContactAction($contact) {
   
        $users= Setting::first();  		
            $subject = "Contact us Inquiry";			
            $to='Admin';
            Mail::send('emails.contactmail', compact('user','to','contact'), function ($message) use ($users,$subject) {
                $message->to($users->email)->subject($subject);
            });           
        
    }
	
}

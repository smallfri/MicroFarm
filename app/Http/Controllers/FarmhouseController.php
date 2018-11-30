<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class FarmhouseController extends Controller {

    
    
    public function dashboard(){
        return view('user-backend.index');
    }   

}

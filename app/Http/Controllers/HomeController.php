<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('home', ['title' => 'Home']);
    }
}

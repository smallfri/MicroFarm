<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class Page2Controller extends Controller
{
    public function __invoke()
    {
        return view('layouts.seed.index', ['title' => 'Seeds']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginprofcontroller extends Controller
{
    public function index()
    {
        
        return view('prof.views.prof_login');
    }
}

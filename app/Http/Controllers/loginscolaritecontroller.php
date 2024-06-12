<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginscolaritecontroller extends Controller
{
    public function index()
    {
        
        return view('scolarite.views.scolarite_login');
    }
}

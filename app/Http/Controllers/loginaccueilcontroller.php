<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginaccueilcontroller extends Controller
{
    public function index()
    {
        
        return view('accueil.views.accueil_login');
    }
}

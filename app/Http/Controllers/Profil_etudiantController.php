<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profil_etudiantController extends Controller
{
    public function index()
    {
        
        return view('etudiant.views.Profil_etudiant');
    }
}

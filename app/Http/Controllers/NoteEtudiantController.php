<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteEtudiantController extends Controller
{
    public function index()
    {
        
        return view('etudiant.views.noteetudiant');
    }
}

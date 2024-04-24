<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReclamationetudiantController extends Controller
{
    public function index(){
        return view('etudiant.views.reclamationetudiant');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmploietudiantController extends Controller
{
    public function index(){
        return view ('etudiant.views.emploietudiant');}
}

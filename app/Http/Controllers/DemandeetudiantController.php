<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemandeetudiantController extends Controller
{
    public function index(){
        return view ('etudiant.views.demandetudiant');}
}

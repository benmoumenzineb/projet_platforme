<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamationmodel;
class ReclamationetudiantController extends Controller
{
    public function index(){
        return view('etudiant.views.reclamationetudiant');
    }
    
}


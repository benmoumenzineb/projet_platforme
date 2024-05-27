<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Profil_etudiantController extends Controller
{
    public function index()
    {
        $user = Auth::guard('etudient')->user();

        // Passer l'utilisateur à la vue
        return view('etudiant.views.Profil_etudiant' , compact('user'));
    }
        
       
    }


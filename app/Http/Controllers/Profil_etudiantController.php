<?php

namespace App\Http\Controllers;
use App\Models\Inscription;
use App\Models\Etudians;
use App\Models\Etablissement;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
class Profil_etudiantController extends Controller
{

   

    

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::guard('etudient')->user();

        if ($request->file('image')) {
            $path = $request->file('image')->store('public/images');
            $user->image = str_replace('public/', 'images/', $path);  // Correct path for asset
            $user->save();
        }
        return redirect()->route('Profil_etudiant')->with('success', 'Image mise à jour avec succès.');
       
       
    }
    
    
    

    public function index()
    {
        $user = Auth::guard('etudient')->user();
        
       
        $inscription = Inscription::where('apogee', $user->apogee)->first();
       
        if ($inscription) {
           
            $etablissement = Etablissement::where('code_etab', $inscription->code_etab)->first();
        } else {
            $etablissement = null;
        }
        if ($inscription) {
            
            $filiere = Filiere::where('id_filiere', $inscription->id_filiere)->first();
        } else {
            $filiere = null;
        }
    
        return view('etudiant.views.Profil_etudiant', compact('user', 'inscription', 'etablissement','filiere'));
    }
   
    }


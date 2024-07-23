<?php

namespace App\Http\Controllers;
use App\Models\Inscription;
use App\Models\Etudians;
use App\Models\Etablissement;
use App\Models\Filiere;
use App\Models\Tuteur_Etudiant;
use App\Models\Tuteur;
use App\Models\Bourse;
use App\Models\Diplome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class Profil_etudiantController extends Controller
{

   

public function uploadImage(Request $request)
{
    // Validation de l'image
    $request->validate([
        'image' => 'required|image',
    ]);

    $user = Auth::guard('etudient')->user();

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time().'_'.$file->getClientOriginalName(); 
        $file->move(public_path('asset/images'), $fileName); 
        $user->image = $fileName;
        $user->save();
    }

    return redirect()->route('Profil_etudiant')->with('success', 'Image mise à jour avec succès.');
} 
    
    

public function index()
{
    $user = Auth::guard('etudient')->user();
    $apogee = $user->apogee;

    // Récupérer les informations de l'étudiant avec ses relations
    $etudiant = Etudians::with([
        'etablissement', 
        'pays', 
        'inscriptions.filiere',
        'tuteur', 
        'bourse',
        'diplome'
         // Charger les bourses associées
    ])->find($apogee);

    // Obtenez les tuteurs associés
    $tuteur = Tuteur::join('tuteur_etudiant', 'tuteur.id_tuteur', '=', 'tuteur_etudiant.id_tuteur')
        ->where('tuteur_etudiant.apogee', $apogee)
        ->get();

    // Déboguer les données
   

    // Retourner la vue avec les données
    return view('etudiant.views.Profil_etudiant', compact('user', 'etudiant', 'tuteur'));
}



}


   
    


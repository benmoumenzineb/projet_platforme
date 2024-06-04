<?php

namespace App\Http\Controllers;
use App\Models\Inscription;
use App\Models\Etudians;
use App\Models\Etablissement;
use App\Models\Filiere;
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

    $inscription = DB::table('inscriptions')
        ->join('etablissement', 'inscriptions.code_etab', '=', 'etablissement.code_etab')
        ->join('filiere', 'inscriptions.id_filiere', '=', 'filiere.id_filiere')
        ->select('inscriptions.*', 'etablissement.ville as etablissement_ville', 'filiere.intitule as filiere_intitule','filiere.cycle as filiere_cycle')
        ->where('inscriptions.apogee', $user->apogee)
        ->first();
      
    $filiere = null;
    if ($inscription) {
        $etablissement = [
            'code_etab' => $inscription->code_etab,
            'ville' => $inscription->etablissement_ville,
        ];

        $filiere = [
            'id_filiere' => $inscription->id_filiere,
            'intitule' => $inscription->filiere_intitule,
            'cycle' => $inscription->filiere_cycle,
        ];
    }

    return view('etudiant.views.Profil_etudiant', compact('user', 'inscription', 'etablissement', 'filiere'));
}


}


   
    


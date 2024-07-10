<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Emploi;
use App\Models\Groupe;
use App\Models\Filiere;
use App\Models\Etablissement;
use App\Models\Inscription;

class EmploiscolariteController extends Controller
{
    public function create()
    {
        $groupes = Groupe::all();
        $filieres = Filiere::all();
        $etablissements = Etablissement::all();
        return view('scolarite.views.emploi', compact('groupes', 'filieres','etablissements'));
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'id_groupe' => 'required|exists:groupe,id_groupe',
            'id_filiere' => 'required|exists:filiere,id_filiere',
            'emploi_pdf' => 'required|file|mimes:pdf|max:2048',
            'semestre' => 'required',
            'code_etab' => 'required',
        ]);

        // Création d'une nouvelle instance d'Emploi avec les données validées
        $emploi = new Emploi();
        $emploi->id_groupe = $validatedData['id_groupe'];
        $emploi->id_filiere = $validatedData['id_filiere'];
        $emploi->semestre = $validatedData['semestre'];
        $emploi->code_etab = $validatedData['code_etab'];

        // Vérification et traitement du fichier PDF téléchargé
        if ($request->hasFile('emploi_pdf')) {
            $file = $request->file('emploi_pdf');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'asset/uploads/' . $fileName;
            $file->move(public_path('asset/uploads'), $fileName);
            $emploi->emploi_pdf = $filePath;
        }

       
        $emploi->save();

        
        return redirect()->route('scolarite.views.emploi')->with('success', 'Emploi du temps envoyé avec succès!');
    }


    public function getGroupesByFiliere($idFiliere)
{
    $groupes = Groupe::where('id_filiere', $idFiliere)->get();
    
   
    
    return response()->json($groupes);
}


public function studentEmploi()
{
    // Récupérer l'ID de l'étudiant connecté
    $studentId = Auth::guard('etudient')->id();
    
    if (!$studentId) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
    }

    \Log::info('ID de l\'étudiant : ' . $studentId);

    // Récupérer l'inscription de l'étudiant
    $inscription = Inscription::where('apogee', $studentId)->first();

   
    $idFiliere = $inscription->id_filiere;
    $codeEtab = $inscription->code_etab;
    $idGroupe = $inscription->id_groupe;

    \Log::info('Filière de l\'étudiant : ' . $idFiliere);
    \Log::info('Code établissement de l\'étudiant : ' . $codeEtab);
    \Log::info('Groupe de l\'étudiant : ' . $idGroupe);

    // Récupérer les emplois du temps pour la filière, l'établissement et le groupe de l'étudiant
    $emplois = Emploi::where('id_filiere', $idFiliere)
                     ->where('code_etab', $codeEtab)
                   
                     ->get();

    \Log::info('Emplois récupérés : ' . json_encode($emplois));

    return view('etudiant.views.emploietudiant', compact('emplois'));
}





    

}

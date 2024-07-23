<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reclamation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class ReclamationetudiantController extends Controller
{
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


    return view('etudiant.views.reclamationetudiant', compact('user', 'inscription', 'etablissement', 'filiere'));
}
public function enregistrerReclamation(Request $request)
{
    // Validation des données du formulaire
    $request->validate([
        'apogee' => 'required|integer',
        'Nom' => 'required|string',
        'Prenom' => 'required|string',
        'Numero' => 'required|string',
        'Email' => 'required|email',
        'intitule' => 'required|string',
        'Type' => 'required|string',
        'Description' => 'required|string',
        'file_reclamation' => 'required|file',
    ]);

    // Vérifiez les valeurs reçues
    
    // Création d'une nouvelle réclamation
    $reclamation = new Reclamation();
    $reclamation->apogee = $request->apogee;
    $reclamation->Nom = $request->Nom;
    $reclamation->Prenom = $request->Prenom;
    $reclamation->Numero = $request->Numero;
    $reclamation->Email = $request->Email;
    $reclamation->intitule = $request->intitule;
    $reclamation->Type = $request->Type;
    $reclamation->Description = $request->Description;

    // Enregistrement de la réclamation dans la base de données
    if ($request->hasFile('file_reclamation')) {
        $file = $request->file('file_reclamation');
        $fileName = $file->getClientOriginalName(); // Obtenez le nom du fichier
        $file->move(public_path('asset/images'), $fileName); // Déplacez le fichier vers le dossier de destination
        $reclamation->file_reclamation = $fileName; // Stockez le nom du fichier dans la base de données
    }

    $reclamation->save();

    return redirect()->route('reclamation')->with('success', 'Réclamation enregistrée avec succès.');
}

}
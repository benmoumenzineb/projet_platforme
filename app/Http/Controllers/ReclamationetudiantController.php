<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reclamation;
use Illuminate\Support\Facades\Storage;



class ReclamationetudiantController extends Controller
{
    public function index()
    {
        $user = Auth::guard('etudient')->user();
        return view('etudiant.views.reclamationetudiant' ,compact('user'));
    }
   

   public function enregistrerReclamation(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
       //name
       'Nom' => 'required',
       'Prenom' => 'required',
       'Numero' => 'required',
       'Email' => 'required|email',
       'Type' => 'required',
       'Description' => 'required',
       'file_reclamation' => 'required',
        ]);

        // Création d'une nouvelle réclamation
        $reclamation = new Reclamation();
         $reclamation->Nom = $request->Nom;
         $reclamation->Prenom = $request->Prenom;
         $reclamation->Numero = $request->Numero;
          $reclamation->Email = $request->Email;
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
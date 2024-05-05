<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use Illuminate\Support\Facades\Storage;



class ReclamationetudiantController extends Controller
{
    public function index(){
        return view('etudiant.views.reclamationetudiant');
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
        $reclamation->file_reclamation=$request->file_reclamation;
        // Enregistrement de la réclamation dans la base de données


        if ($request->hasFile('file_reclamation')) {
            $file = $request->file('file_reclamation');
            $fileName = $file->getClientOriginalName(); // Corrected variable name
            $file->move(public_path('asset/images'), $fileName);
            $reclamation->file_reclamation = $fileName; // Store the filename in the database
        }
        
        
        $reclamation->save();

        return redirect()->route('reclamation')->with('success', 'Réclamation enregistrée avec succès.');
        
    }
}
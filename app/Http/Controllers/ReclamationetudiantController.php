<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamationmodel;

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
            'type' => 'required',
            'description' => 'required',
        ]);

        // Création d'une nouvelle réclamation
        $reclamation = new Reclamationmodel();
        $reclamation->type = $request->type;
        $reclamation->description = $request->description;
        // Enregistrement de la réclamation dans la base de données
        $reclamation->save();

        return redirect()->route('reclamation')->with('success', 'Réclamation enregistrée avec succès.');
        
    }
}

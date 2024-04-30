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
        // Valider les données soumises par le formulaire
        $request->validate([
            'Type' => 'required',
            'Description' => 'required',
            // Ajoutez ici d'autres règles de validation si nécessaire
        ]);

        // Créer une nouvelle instance de Reclamation
        $reclamation = new Reclamation();

        // Assigner les valeurs soumises au modèle
        $reclamation->Type = $request->input('Type');
        $reclamation->Description = $request->input('Description');
        // Assurez-vous de modifier ces noms de propriétés en fonction de votre formulaire

        // Sauvegarder la réclamation dans la base de données
        $reclamation->save();

        // Rediriger avec un message de succès ou autre logique appropriée
        return redirect()->back()->with('success', 'Réclamation enregistrée avec succès!');
    }
}


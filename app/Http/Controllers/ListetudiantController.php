<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;

class ListetudiantController extends Controller
{
    public function index()
    {
        $etudians = Etudians::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.listeetudiant', ['etudians' => $etudians]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $etudians = Etudians::where('Nom', 'like', "%$query%")
                              ->orWhere('CNE', 'like', "%$query%")
                              ->orWhere('apogee', 'like', "%$query%")
                              ->orWhere('CNI', 'like', "%$query%")
                              ->orWhere('Prenom', 'like', "%$query%")
                              ->orWhere('Date_naissance', 'like', "%$query%")
                              ->orWhere('Date_inscription', 'like', "%$query%")
                              ->paginate(10);
        return view('scolarite.views.listeetudiant', compact('etudians'));
    }
   
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'Nom' => 'required|string',
            'Prenom' => 'required|string',
            'CNE' => 'required|string',
            'CNI' => 'required',
            'apogee' => 'required',
            'Sexe' => 'required',
            'Date_naissance' => 'required',
            'Pays' => 'required',
            'Diplome_acces' => 'required',
            'Serie_bac' => 'required',
            'Date_inscription' => 'required',
            'Specialite_diplome' => 'required',
            'Mention_bac' => 'required',
            'Etablissement_bac' => 'required',
            'Pourcentage_bourse' => 'required',
            // Ajoutez ici les règles de validation pour les autres champs
        ]);

        // Créer un nouvel étudiant avec les données du formulaire
        $etudiant = new Etudians([
            'Nom' => $request->input('Nom'),
            'Prenom' => $request->input('Prenom'),
            'CNI' => $request->input('CNI'),
            'apogee' => $request->input('apogee'),
            'Sexe' => $request->input('Sexe'),
            'Date_naissance' => $request->input('Date_naissance'),
            'Pays' => $request->input('Pays'),
            'Diplome_acces' => $request->input('Diplome_acces'),
            'Serie_bac' => $request->input('Serie_bac'),
            'Date_inscription' => $request->input('Date_inscription'),
            'Specialite_diplome' => $request->input('Specialite_diplome'),
            'Mention_bac' => $request->input('Mention_bac'),
            'Etablissement_bac' => $request->input('Etablissement_bac'),
            'Pourcentage_bourse' => $request->input('Pourcentage_bourse'),
            

            // Ajoutez ici les autres champs du formulaire
        ]);

        // Sauvegarder l'étudiant dans la base de données
        $etudiant->save();

        // Rediriger l'utilisateur vers une autre page avec un message de succès
        return redirect()->route('listeetudiant')->with('success', 'Étudiant ajouté avec succès.');
    }
}


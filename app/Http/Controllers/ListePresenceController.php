<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;

class ListePresenceController extends Controller
{
    
   /* public function indexx(Request $request)
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
*/

    

    

public function indexx(Request $request)
{
    try {
        // Récupérer les valeurs des critères choisis depuis la requête
        $cycle = $request->input('cycle');
        $filiere = $request->input('filiere');
        $niveau = $request->input('niveau');
        $groupe = $request->input('groupe');
        $matiere = $request->input('matiere');
        
        // Commencer avec une requête pour les étudiants
        $query = Etudians::query();
        
        // Ajouter les clauses de recherche basées sur les critères choisis
        $query->where('Cycle', $cycle)
              ->where('Groupe', $groupe)
              ->where('Matiere', $matiere);
        
        // Ajouter le critère du niveau uniquement si le champ de la filière est rempli
        if ($filiere) {
            $query->where('Filiere', $filiere);
            
            // Inclure le critère de niveau si le champ de niveau est également rempli
            if ($niveau) {
                $query->where('Niveau', $niveau);
            }
        }
        // Exécuter la requête et récupérer les résultats
        $etudians = $query->get(['Nom', 'Prenom']);
        
        // Utiliser dd pour afficher les résultats de la requête
        //dd($etudians);
        
        // Retourner la vue avec les étudiants filtrés
        return view('Prof.views.listepresence', compact('etudians'));
    } catch (\Throwable $th) {
        $th->getMessage();
    }
}
}
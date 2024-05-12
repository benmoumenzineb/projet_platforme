<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;

class AjouteNoteController extends Controller
{
    
    
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
        $etudians = $query->get(['apogee','Nom', 'Prenom','CNE']);
        
        // Utiliser dd pour afficher les résultats de la requête
        //dd($etudians);
        
        // Retourner la vue avec les étudiants filtrés
        return view('Prof.views.ajoutenote', compact('etudians'));
    } catch (\Throwable $th) {
        $th->getMessage();
    }
}
public function search(Request $request)
{
    try {
        $query = $request->input('query');

        // Séparer le nom et le prénom à partir de la requête de recherche
        $keywords = explode(' ', $query);

        // Filtrer les étudiants en fonction du nom et du prénom de la recherche
        $etudians = Etudians::where(function($q) use ($keywords) {
                                foreach ($keywords as $keyword) {
                                    $q->orWhere('Nom', 'like', "%$keyword%")
                                      ->orWhere('Prenom', 'like', "%$keyword%")
                                      ->orWhere('CNE', 'like', "%$keyword%")
                                      ->orWhere('apogee', 'like', "%$keyword%");
                                }
                            })
                            ->get();

        return view('Prof.views.ajoutenote', compact('etudians'));
    } catch (\Throwable $th) {
        // Gérer les erreurs ici
    }
}

}
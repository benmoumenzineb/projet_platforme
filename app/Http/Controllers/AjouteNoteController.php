<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
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
        
        
        $query->where('Cycle', $cycle)
              ->where('Groupe', $groupe)
              ->where('Matiere', $matiere);
        
        
        if ($filiere) {
            $query->where('Filiere', $filiere);
            
         
            if ($niveau) {
                $query->where('Niveau', $niveau);
            }
        }
        // Exécuter la requête et récupérer les résultats
        $etudians = $query->get();
        
        // Utiliser dd pour afficher les résultats de la requête
        //dd($etudians);
        
        // Retourner la vue avec les étudiants filtrés
        return view('Prof.views.ajoutenote', compact('etudians'));
    } catch (\Throwable $th) {
        $th->getMessage();
    }
}



public function fetchEtudiants()
    {
        $etudiants = Etudians::select(['apogee', 'CNE', 'CNI', 'Nom', 'Prenom', 'CTR1', 'CTR2', 'EF', 'TP']);

        return DataTables::of($etudiants)
            ->addColumn('actions', function ($etudiant) {
                // Ajoutez ici le code pour les actions (par exemple, le bouton d'édition)
                return '<button class="btn btn-sm btn-primary edit-btn" data-id="' . $etudiant->id . '">Éditer</button>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
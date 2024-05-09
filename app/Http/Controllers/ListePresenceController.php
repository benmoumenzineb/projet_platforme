<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;

class ListePresenceController extends Controller
{
    
   /* public function index()
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
            // Récupérer les valeurs des critères choisis depuis la requête
            $cycle = $request->input('Cycle');
            $filiere = $request->input('Filiere');
            $niveau = $request->input('Niveau');
            $groupe = $request->input('Groupe');
            $matiere = $request->input('Matiere');
    
            // Filtrer les étudiants en fonction des critères choisis
            $etudians = Etudians::where('Cycle', $cycle)
                                 ->where('Filiere', $filiere)
                                 ->where('Niveau', $niveau)
                                 ->where('Groupe', $groupe)
                                 ->where('Matiere', $matiere)
                                 ->get(['Nom', 'Prenom']);
    
            // Retourner la vue avec les étudiants filtrés
            return view('Prof.views.listepresence', compact('etudians'));
        }
    }
    


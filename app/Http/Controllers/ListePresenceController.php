<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class ListePresenceController extends Controller
{
    
 

    

    


    public function getEtudiants(Request $request)
    {
        $cycle = $request->input('cycle');
        $filiere = $request->input('filiere');
        $matiere = $request->input('matiere');
        $groupe = $request->input('groupe');
       
        // Stockez les choix dans des variables de session
        $request->session()->put('cycle', $cycle);
        $request->session()->put('filiere', $filiere);
        $request->session()->put('matiere', $matiere);
        $request->session()->put('groupe', $groupe);
        
        $etudiants = Etudians::where('Cycle', $cycle)
                            ->where('Filiere', $filiere)
                            ->where('Matiere', $matiere)
                            ->where('Groupe', $groupe)
                            ->get(['apogee','CNE','CNI','Nom','Prenom']);
        
        // Redirigez vers la deuxième vue avec les choix comme paramètres d'URL
        return view('Prof.views.listepresence', compact('etudiants'));
    }
    
    public function getEtudiantsData(Request $request)
    { 
        $cycle = $request->session()->get('cycle');
        $filiere = $request->session()->get('filiere');
        $matiere = $request->session()->get('matiere');
        $groupe = $request->session()->get('groupe');
    
        $etudiants = Etudians::where('Cycle', $cycle)
                            ->where('Filiere', $filiere)
                            ->where('Matiere', $matiere)
                            ->where('Groupe', $groupe)
                            ->get(['apogee','CNE','CNI','Nom','Prenom']);
        
        $formattedData = DataTables::of($etudiants)
            ->addIndexColumn()
            ->make(true);
    
        // Retournez les données formatées sous forme de réponse JSON pour DataTables
        return $formattedData;
    }
}
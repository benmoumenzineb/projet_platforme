<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;
class AjouteNoteController extends Controller
{
   

    public function indexx(Request $request)
    {
        if ($request->ajax()) {
            // Récupérer les valeurs des critères choisis depuis la requête
            $cycle = $request->input('cycle');
            $filiere = $request->input('filiere');
            $niveau = $request->input('niveau');
            $groupe = $request->input('groupe');
            $matiere = $request->input('matiere');
    
            // Commencer avec une requête pour les étudiants
            $query = Etudians::query();
    
            // Appliquer les filtres en fonction des critères choisis
            if ($cycle) {
                $query->where('Cycle', $cycle);
            }
            if ($filiere) {
                $query->where('Filiere', $filiere);
            }
            if ($niveau) {
                $query->where('Niveau', $niveau);
            }
            if ($groupe) {
                $query->where('Groupe', $groupe);
            }
            if ($matiere) {
                $query->where('Matiere', $matiere);
            }
    
            // Récupérer les données du DataTables
            $etudiants = $query->get(['apogee','CNE','CNI','Nom','Prenom','CTR1','CTR2','EF','TP']);
    
            // Renvoyer les données au format JSON requis par DataTables
            return DataTables::of($etudiants)
                ->make(true);
        
    
        // Si la requête n'est pas AJAX, renvoyer la vue normale
        
    }
    return view('Prof.views.ajoutenote');
    }

/*public function fetchEtudiants(Request $request)
{
    // Récupérer le cycle depuis la requête
    $cycle = $request->input('cycle');

    // Utiliser le cycle pour filtrer les étudiants
    $etudiants = Etudians::where('Cycle', $cycle)->get(['apogee','CNE','CNI','Nom','Prenom','CTR1','CTR2','EF','TP']);

    // Renvoyer les données au format JSON requis par DataTables
    return DataTables::of($etudiants) 
         ->make(true);
}



 
public function fetchEtudiants(Request $request)
{
    $cycle = $request->input('cycle');

    // Utiliser le cycle pour filtrer les étudiants
    $etudiants = Etudians::where('Cycle', $cycle)->get(['apogee','CNE','CNI','Nom','Prenom','CTR1','CTR2','EF','TP']);

    // Renvoyer les données au format JSON requis par DataTables
    return DataTables::of($etudiants)
         ->addIndexColumn()
         ->make(true);
}*/

public function index(Request $request)
{
    return view('prof.views.noteprof');
}



public function getEtudiantsByCycle(Request $request)
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
    
    $query = Etudians::query();

    // Joindre la table "seance" pour obtenir les informations pertinentes
    $query
          ->join('programme_filiere', 'programme_filiere.id_filiere', '=', 'filiere.id_filiere')
          -> join('groupe', 'filiere.id_filiere', '=', 'groupe.id_filiere')
          ->join('notes_evaluation', 'programme_filiere.num_element', '=', 'notes_evaluation.num_element')
          ->leftJoin('notes_evaluation', 'etudient.apogee', '=', 'notes_evaluation.apogee');
   
          if ($cycle) {
            $query->where('filiere.cycle', $cycle);
        }
        if ($matiere) {
            $query->where('element.intitule', $matiere);
        }
        if ($groupe) {
            $query->where('groupe.intitule', $groupe);
        }
        if ($filiere) {
            $query->where('filiere.intitule', $filiere);
        }
        // Récupérer les données du DataTables
       /* $etudiants = $query->get([
            'etudient.apogee',
            'etudient.CNE',
            'etudient.CNI',
            'etudient.Nom',
            'etudient.Prenom',
            'notes_evaluation.CTR1',
            'notes_evaluation.CTR2',
            'notes_evaluation.EF',
            'notes_evaluation.TP'
        ]);*/
    
    
        // Renvoyer les données au format JSON requis par DataTables
        
    
  
   
    
    
 
    return view('Prof.views.ajoutenote');
}

public function getEtudiantsData(Request $request)
{ 
    $cycle = $request->session()->get('cycle');
    $filiere = $request->session()->get('filiere');
    $matiere = $request->session()->get('matiere');
    $groupe = $request->session()->get('groupe');

    
    
  
    $query = Etudians::query();

    // Joindre la table "seance" pour obtenir les informations pertinentes
   
    // Joindre la table "seance" pour obtenir les informations pertinentes
    $query
          ->join('programme_filiere', 'programme_filiere.id_filiere', '=', 'filiere.id_filiere')
          -> join('groupe', 'filiere.id_filiere', '=', 'groupe.id_filiere')
          ->join('notes_evaluation', 'programme_filiere.num_element', '=', 'notes_evaluation.num_element')
          ->leftJoin('notes_evaluation', 'etudient.apogee', '=', 'notes_evaluation.apogee');
   
          if ($cycle) {
            $query->where('filiere.cycle', $cycle);
        }
        if ($matiere) {
            $query->where('element.intitule', $matiere);
        }
        if ($groupe) {
            $query->where('groupe.intitule', $groupe);
        }
        if ($filiere) {
            $query->where('filiere.intitule', $filiere);
        }
        /// Récupérer les données du DataTables
        $etudiants = $query->get([
            'etudient.apogee',
            'etudient.CNE',
            'etudient.CNI',
            'etudient.Nom',
            'etudient.Prenom',
            'notes_evaluation.CTR1',
            'notes_evaluation.CTR2',
            'notes_evaluation.EF',
            'notes_evaluation.TP'
        ]);
    
   
    $formattedData = DataTables::of($etudiants)
    ->addIndexColumn()
    ->addColumn('actions', function($etudiants) {
        return '<div style="display: flex; gap: 5px;">
        <button type="button" class="btn btn-primary edit-btn" data-id="' . $etudiants->apogee . '" style="width:50px;">Edit</button> </div>';
            })
            ->rawColumns(['actions'])
        ->make(true);

    // Retournez les données formatées sous forme de réponse JSON pour DataTables
    return $formattedData;
}

public function update(Request $request)
    {
        $etudiant = Note::find($request->apogee);
        
        $etudiant->CTR1= $request->CTR1;
        $etudiant->CTR2= $request->CTR2;
        $etudiant->EF = $request->EF;
        $etudiant->TP = $request->TP;
        $etudiant->save();
        return redirect()->back()->with('success', 'Informations de l\'étudiant mises à jour avec succès.');
    }
}
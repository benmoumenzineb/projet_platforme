<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Etablissement;
use App\Models\Note;
use Yajra\DataTables\DataTables;
class AjouteNoteController extends Controller
{
  /* 

    public function indexx(Request $request)
    {
        if ($request->ajax()) {
            
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

public function fetchEtudiants(Request $request)
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
{  $etab = $request->input('etablissement');
    $cycle = $request->input('cycle');
    $filiere = $request->input('filiere');
    $matiere = $request->input('matiere');
    $groupe = $request->input('groupe');
   
    // Stockez les choix dans des variables de session
    $request->session()->put('etablissement', $etab);
    $request->session()->put('cycle', $cycle);
    $request->session()->put('filiere', $filiere);
    $request->session()->put('matiere', $matiere);
    $request->session()->put('groupe', $groupe);
    
    $query = Etudians::query();
   $query->select([
    'etudient.id as id',
    'etudient.apogee as apogee',
    'etudient.CNE as CNE',
    'etudient.CNI as CNI',
    'etudient.Nom as Nom',
    'etudient.Prenom as Prenom',
    'notes_evaluation.CTR1 as CTR1',
    'notes_evaluation.CTR2 as CTR2',
    'notes_evaluation.EF as EF',
    'notes_evaluation.TP as TP'
]);

$query->join('inscriptions', 'inscriptions.apogee', '=', 'etudient.apogee')
          ->join('notes_evaluation as ne', 'ne.apogee', '=', 'etudient.apogee')
          ->join('element as em', 'em.num_element', '=', 'ne.num_element')
          ->join('filiere as f', 'f.id_filiere', '=', 'inscriptions.id_filiere')
          ->join('etablissement', 'etablissement.code_etab', '=', 'inscriptions.code_etab')
          ->join('groupe as g', 'g.id_filiere', '=', 'f.id_filiere');

    if ($etab) {
        $query->where('etablissement.ville', $etab);
    }
    if ($cycle) {
        $query->where('f.cycle', $cycle);
    }
    if ($matiere) {
        $query->where('em.intitule', $matiere);
    }
    if ($groupe) {
        $query->where('g.intitule', $groupe);
    }
    if ($filiere) {
        $query->where('f.intitule', $filiere);
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
    
    
      
        
    
  
   
    
    
 
    return view('Prof.views.ajoutenote');
}

public function getEtudiantsData(Request $request)
{ 
    $etab = $request->session()->get('etablissement');
    $cycle = $request->session()->get('cycle');
    $filiere = $request->session()->get('filiere');
    $matiere = $request->session()->get('matiere');
    $groupe = $request->session()->get('groupe');

   $query = Etudians::query();
   $query->select([
    'etudient.id',
    'etudient.apogee',
    'etudient.CNE',
    'etudient.CNI',
    'etudient.Nom',
    'etudient.Prenom',
    'notes_evaluation.CTR1 as CTR1',
    'notes_evaluation.CTR2 as CTR2',
    'notes_evaluation.EF as EF',
    'notes_evaluation.TP as TP'
]);

$query->join('inscriptions', 'inscriptions.apogee', '=', 'etudient.apogee')
          ->join('notes_evaluation as ne', 'ne.apogee', '=', 'etudient.apogee')
          ->join('element as em', 'em.num_element', '=', 'ne.num_element')
          ->join('filiere as f', 'f.id_filiere', '=', 'inscriptions.id_filiere')
          ->join('etablissement', 'etablissement.code_etab', '=', 'inscriptions.code_etab')
          ->join('groupe as g', 'g.id_filiere', '=', 'f.id_filiere');

    if ($etab) {
        $query->where('etablissement.ville', $etab);
    }
    if ($cycle) {
        $query->where('f.cycle', $cycle);
    }
    if ($matiere) {
        $query->where('em.intitule', $matiere);
    }
    if ($groupe) {
        $query->where('g.intitule', $groupe);
    }
    if ($filiere) {
        $query->where('f.intitule', $filiere);
    }

    
     

$etudiants = $query->get();

$formattedData = DataTables::of($etudiants)
    ->addIndexColumn()
    ->addColumn('actions', function($etudiant) {
        return '<div style="display: flex; gap: 5px;">
            <button type="button" class="btn btn-primary edit-btn" data-id="' . $etudiant->id . '" style="width:50px;">Edit</button>
        </div>';
    })
    ->rawColumns(['actions'])
    ->make(true);

return $formattedData;
   
   
}

public function update(Request $request)
    {
        /*$etudiant = Note::find($request->apogee);
        
        $etudiant->CTR1= $request->CTR1;
        $etudiant->CTR2= $request->CTR2;
        $etudiant->EF = $request->EF;
        $etudiant->TP = $request->TP;
        $etudiant->save();
        return redirect()->back()->with('success', 'Informations de l\'étudiant mises à jour avec succès.');
    }*/
    try {
        DB::beginTransaction();
    
        $etudiant = Note::find($request->apogee);
        $etudiant->CTR1 = $request->CTR1;
        $etudiant->CTR2 = $request->CTR2;
        $etudiant->EF = $request->EF;
        $etudiant->TP = $request->TP;
        $etudiant->save();
    
        DB::commit();
    
        return redirect()->back()->with('success', 'Informations de l\'étudiant mises à jour avec succès.');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour des informations de l\'étudiant.');
    }
}}
<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Etablissement;
use App\Models\Filiere;
use App\Models\Groupe;
use App\Models\Inscription;
use App\Models\Note;
use DB;
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
    $niveau = $request->input('niveau');
    // Stockez les choix dans des variables de session
    $request->session()->put('etablissement', $etab);
    $request->session()->put('cycle', $cycle);
    $request->session()->put('filiere', $filiere);
    $request->session()->put('matiere', $matiere);
    $request->session()->put('groupe', $groupe);
    $request->session()->put('niveau', $niveau);
    $query = Etudians::query()
    ->select([
       
        'etudient.id',
        'etudient.CNE',
        'etudient.CNI',
        'etudient.Nom',
        'etudient.Prenom',
        'notes_evaluation.CTR1 as CTR1',
        'notes_evaluation.CTR2 as CTR2 ',
        'notes_evaluation.EF  as EF',
        'notes_evaluation.TP  as TP'
    ])->leftJoin('notes_evaluation', 'etudient.apogee', '=', 'notes_evaluation.apogee')
    ->join('inscriptions as i', 'i.apogee', '=', 'etudient.apogee')
    ->join('element as e', 'e.num_element', '=', 'notes_evaluation.num_element')
    ->join('filiere as f', 'f.id_filiere', '=', 'i.id_filiere')
    ->join('etablissement as et', 'et.code_etab', '=', 'i.code_etab')
    ->join('groupe as g', 'g.id_filiere', '=', 'f.id_filiere');

if ($etab) {
    $query->where('et.ville', $etab);
}
if ($cycle) {
    $query->where('f.cycle', $cycle);
}
if ($matiere) {
    $query->where('e.intitule', $matiere);
}

if ($filiere) {
    $query->where('f.intitule', $filiere);
}
if ($cycle) {
    $query->where('f.cycle', $cycle);
}
if ($groupe) {
    $query->where('g.intitule', $groupe);
} elseif ($niveau) {
    $query->where('i.niveau', $niveau);
}

// Log the generated SQL query and bindings
\Log::info($query->toSql());
\Log::info($query->getBindings());

$etudiants = $query->get();

      
        
    
  
   
    
    
 
    return view('Prof.views.ajoutenote');
}

public function getEtudiantsData(Request $request)
{ 
    $etab = $request->session()->get('etablissement');
        $cycle = $request->session()->get('cycle');
        $filiere = $request->session()->get('filiere');
        $matiere = $request->session()->get('matiere');
        $groupe = $request->session()->get('groupe');
        $niveau= $request->session()->get('niveau');
        $query = Etudians::query()
            ->select([
                'etudient.apogee',
                'etudient.CNE',
                'etudient.CNI',
                'etudient.Nom',
                'etudient.Prenom',
                'notes_evaluation.CTR1 as CTR1',
                'notes_evaluation.CTR2 as CTR2',
                'notes_evaluation.EF as EF',
                'notes_evaluation.TP as TP'
            ])
            ->join('inscriptions', 'inscriptions.apogee', '=', 'etudient.apogee')
            ->join('notes_evaluation', 'notes_evaluation.apogee', '=', 'etudient.apogee')
            ->join('element', 'element.num_element', '=', 'notes_evaluation.num_element')
            ->join('filiere', 'filiere.id_filiere', '=', 'inscriptions.id_filiere')
            ->join('etablissement', 'etablissement.code_etab', '=', 'inscriptions.code_etab')
            ->join('groupe', 'groupe.id_filiere', '=', 'filiere.id_filiere');

        if ($etab) {
            $query->where('etablissement.ville', $etab);
        }
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
       \Log::info($query->toSql());
        \Log::info($query->getBindings());
      
        $etudiants = $query->get();
        \Log::info($etudiants);
        $formattedData = DataTables::of($etudiants)
            ->addIndexColumn()
            ->addColumn('actions', function ($etudiant) {
                return '<div style="display: flex; gap: 5px;">
                    <button type="button" class="btn btn-primary edit-btn" data-id="' . $etudiant->apogee. '" style="width:50px;">Edit</button>
                </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);

        return $formattedData;
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
    
            // Trouver la note en utilisant le code Apogee
            $note = Note::where('apogee', $request->apogee)->first();
            if (!$note) {
                throw new \Exception('Notes non trouvées');
            }
    
            // Mettre à jour les notes
            $note->CTR1 = $request->CTR1;
            $note->CTR2 = $request->CTR2;
            $note->EF = $request->EF;
            $note->TP = $request->TP;
            $note->save();
    
            DB::commit();
    
            return redirect()->back()->with('success', 'Informations de l\'étudiant mises à jour avec succès.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour des informations de l\'étudiant.');
        }
    }}
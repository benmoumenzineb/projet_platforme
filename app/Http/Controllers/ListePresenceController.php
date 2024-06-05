<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Etablissement;
use App\Models\Filiere;
use App\Models\Groupe;
use App\Models\Inscription;
use App\Models\Absence;
use DB;

use Yajra\DataTables\DataTables;
class ListePresenceController extends Controller
{
    



    public function getEtudiants(Request $request)
    {
        $etab = $request->input('etablissement');
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
        
      
       
    
      
        return view('Prof.views.listepresence');
        
      
    
    }
    
    public function getEtudiantsData(Request $request)
    { 
         // Récupérez les valeurs choisies
         $etab = $request->session()->get('etablissement');
         $cycle = $request->session()->get('cycle');
         $filiere = $request->session()->get('filiere');
         $matiere = $request->session()->get('matiere');
         $groupe = $request->session()->get('groupe');
         $niveau= $request->session()->get('niveau');
         $query = Etudians::query()
             ->select([
                 'etudient.apogee as Apogee',
                 'etudient.CNE',
                 'etudient.CNI',
                 'etudient.Nom',
                 'etudient.Prenom',
                 'absence.date_abs as Date',
                 'absence.heure_abs as Heure',
                 'absence.absence as absence'
                 
             ])
             ->join('inscriptions', 'inscriptions.apogee', '=', 'etudient.apogee')
             ->join('absence', 'absence.apogee', '=', 'etudient.apogee')
             ->join('element', 'element.num_element', '=', 'absence.num_element')
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
        elseif ($niveau) {
            $query->where('inscriptions.niveau', $niveau);
        } 
         if ($filiere) {
             $query->where('filiere.intitule', $filiere);
         }
         \Log::info($query->toSql());
         \Log::info($query->getBindings());
         
         $etudiants = $query->get();
         
         $formattedData = DataTables::of($etudiants)
             ->addIndexColumn()
             ->addColumn('actions', function ($etudiant) {
                 return '<div style="display: flex; gap: 5px;">
                     <button type="button" class="btn btn-primary edit-btn" data-id="' . $etudiant->Apogee . '" style="width:50px;">Edit</button>
                 </div>';
             })
             ->rawColumns(['actions'])
             ->make(true);
 
         return $formattedData;
     }
        
    
    
    
      
            
     
     
   
     
      


     public function updateAbsence(Request $request)
     {
         $validated = $request->validate([
             'apogee' => 'required|exists:absence,apogee',
             'absence' => 'nullable|in:A,P,R',
         ]);
     
         // Affiche les données validées pour vérification
         \Log::info('Données validées: ', $validated);
     
         try {
             DB::beginTransaction();
     
             // Trouver l'absence en utilisant le code Apogee
             $absence = Absence::where('apogee', $validated['apogee'])->first();
     
             // Vérifiez si l'enregistrement est trouvé
             if (!$absence) {
                 \Log::warning('Aucune absence trouvée pour Apogee: ' . $validated['apogee']);
                 DB::rollback();
                 return redirect()->back()->with('error', 'Aucune absence trouvée pour cet Apogee.');
             }
     
             \Log::info('Absence trouvée: ', $absence->toArray());
     
             // Mettre à jour l'état, en gérant les valeurs nulles
             $absence->absence = $validated['absence']??null;
             $absence->save();
     
             \Log::info('Absence mise à jour avec succès pour Apogee: ' . $validated['apogee']);
     
             DB::commit();
     
             return redirect()->back()->with('success', 'Informations de l\'étudiant mises à jour avec succès.');
         } catch (\Exception $e) {
             DB::rollback();
             \Log::error('Erreur de mise à jour de l\'absence : ' . $e->getMessage());
             return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour des informations de l\'étudiant.');
         }
     }
}
     

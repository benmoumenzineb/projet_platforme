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
                 'etudient.apogee as id',
                 'etudient.CNE',
                 'etudient.CNI',
                 'etudient.Nom',
                 'etudient.Prenom',
                 'absence.date_abs as Date',
                 'absence.heure_abs as Heure',
                 'absence.etat as absence'
                 
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
            $query->where('inscriptions.niveau', $nivea);
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
                     <button type="button" class="btn btn-primary edit-btn" data-id="' . $etudiant->id . '" style="width:50px;">Edit</button>
                 </div>';
             })
             ->rawColumns(['actions'])
             ->make(true);
 
         return $formattedData;
     }
        
    
    public function updateAbsence(Request $request)
    {
        $etudiant = Absence::find($request->apogee);
        
        $etudiant->etat= $request->absence;
      
        $etudiant->save();
        DB::commit();
        return redirect()->back()->with('success', 'Informations de l\'étudiant mises à jour avec succès.');
    }
    
}
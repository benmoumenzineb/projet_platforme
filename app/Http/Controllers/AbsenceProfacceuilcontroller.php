<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel; 
use DataTables;

class AbsenceProfacceuilcontroller extends Controller
{
    public function index(Request $request)
    {
        return view('accueil.views.absenceprof');
    }

    public function fetchPersonnel()
    {
        $personnel = Personnel::select(['cin_salarie', 'nom', 'prenom', 'etablissement']);

        return DataTables::of($personnel)
        ->addIndexColumn()
        ->addColumn('actions', function($personnel) {
            return '<div style="display: flex; gap: 5px;">
                    <button type="button" class="btn btn-primary edit-btn" data-id="' . $personnel->cin_salarie . '" style="width:auto; background-color: #173165;">Modifier</button>
                   
                </div>';
    })
           
 
        ->rawColumns(['actions'])
        ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'cin_salarie' => 'required|exists:personnel,cin_salarie',
            'num_element' => 'required|exists:element,num_element',        
            'heure_depart' => 'required',
            'heure_fin' => 'required',
            'date_seance' => 'required',
        ]);

        Accueil::create([
            'cin_salarie' => $request->cin_salarie,
            'num_element' => $request->num_element,
            'heure_fin' => $request->heure_fin,
            'heure_depart' => $request->heure_depart,
            'date_seance' => $request->date_seance,
        ]);

        

        return redirect()->route('accueil.views.absenceprof')->with('success', 'Notification envoyée avec succès.');
    }
}

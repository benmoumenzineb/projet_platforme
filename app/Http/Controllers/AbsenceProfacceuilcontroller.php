<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel; 
use App\Models\Enseignant; 
use App\Models\Element;
use App\Models\Absence_Accueil; 
use DataTables;
use Illuminate\Support\Facades\Log;

class AbsenceProfacceuilcontroller extends Controller
{
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

    public function create()
    {
        $elements = Element::all();
        $enseignants = Enseignant::all();
        return view('accueil.views.absenceprof', compact('elements', 'enseignants'));
    }

    public function store(Request $request)
    {
        Log::info('Requête de validation :', $request->all());

        $validatedData = $request->validate([
            'cin_salarie' => 'required|exists:personnel,cin_salarie', // Correction du nom de la table
            'num_element' => 'required|exists:element,num_element', // Correction du nom de la table
            'heure_depart' => 'required',
            'heure_fin' => 'required',
            'date_seance' => 'required',
        ]);

        Log::info('Validation réussie.');
        Log::info('Données validées :', $validatedData);

        $absence = new Absence_Accueil();
        $absence->cin_salarie = $validatedData['cin_salarie'];
        $absence->num_element = $validatedData['num_element'];
        $absence->heure_depart = $validatedData['heure_depart'];
        $absence->heure_fin = $validatedData['heure_fin'];
        $absence->date_seance = $validatedData['date_seance'];

        Log::info('Données d\'absence avant enregistrement :', $absence->toArray());

        $absence->save();

        Log::info('Absence enregistrée avec succès :', $absence->toArray());

        return redirect()->route('absenceacceuil')->with('success', 'Absence enregistrée avec succès.');
    }
}

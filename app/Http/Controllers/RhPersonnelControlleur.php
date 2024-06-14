<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Personnel;


class RhPersonnelControlleur extends Controller
{
    



   
    public function index()
    {
        
        $etudiants = Etudians::paginate(10); 

        
    return view('RH.views.rhpersonnel', ['etudiants' => $etudiants]);


    }

    
    public function fetchPersonnel()
{
    $personnel = Personnel::select([
        'cin_salarie', 'matricule_cnss', 'RIB', 'nom', 'prenom', 'etablissement',
        'RIB_pdf', 'type_contrat', 'contrat_pdf', 'cv_pdf', 'cin_pdf'
    ]);

    return DataTables::of($personnel)
        ->addIndexColumn()
        ->addColumn('RIB_pdf', function ($personnel) {
            return $personnel->RIB_pdf ? '<a href="' . asset('asset/images/' . $personnel->RIB_pdf) . '" target="_blank">Voir</a>' : 'vide';
        })
        ->addColumn('contrat_pdf', function ($personnel) {
            return $personnel->contrat_pdf ? '<a href="' . asset('asset/images/' . $personnel->contrat_pdf) . '" target="_blank">Voir</a>' : 'vide';
        })
        ->addColumn('cv_pdf', function ($personnel) {
            return $personnel->cv_pdf ? '<a href="' . asset('asset/images/' . $personnel->cv_pdf) . '" target="_blank">Voir</a>' : 'vide';
        })
        ->addColumn('cin_pdf', function ($personnel) {
            return $personnel->cin_pdf ? '<a href="' . asset('asset/images/' . $personnel->cin_pdf) . '" target="_blank">Voir</a>' : 'vide';
        })
        ->addColumn('actions', function ($personnel) {
            return '<div style="display: flex; gap: 5px;">
                        <button type="button" class="btn btn-primary edit-btn" data-id="' . $personnel->cin_salarie . '" style="width:auto; background-color: #173165;">Modifier</button>
                        <form id="delete-form-' . $personnel->cin_salarie . '" action="' . route('personnel.destroy', $personnel->cin_salarie) . '" method="POST" style="margin: 0;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="button" class="btn btn-danger" onclick="confirmDelete(' . $personnel->cin_salarie . ')" style="width:auto;">Supprimer</button>
                        </form>
                    </div>';
        })
        ->rawColumns(['RIB_pdf', 'contrat_pdf', 'cv_pdf', 'cin_pdf', 'actions'])
        ->make(true);
}

    public function updatePersonnel(Request $request)
    {
        dd($request->id);
        // Récupérer l'étudiant à partir de l'ID
        $etudiants = Etudians::findOrFail($request->id);
        if ($etudiants) {
        // Mettre à jour les informations de l'étudiant avec les données du formulaire
        
        $etudiants->Nom = $request->Nom;
        $etudiants->Prenom = $request->Prenom;
        $etudiants->CNE = $request->CNE;
        $etudiants->CNI = $request->CNI;
        $etudiants->Date_naissance = $request->Date_naissance;
        $etudiants->Sexe = $request->Sexe;

        
        $etudiants->save();
      
        return redirect()->back()->with('success', 'Les informations de l\'étudiant ont été mises à jour avec succès.');}
        else {
            
            return response()->json(['error' => 'etudiant non trouvé.'], 404);}
        
        
       
    }
    
    public function deletePersonnel(Request $request)
    {
        // Récupérer l'étudiant à partir de l'ID et le supprimer
        $etudiant = Etudians::find($request->etudiant_id);
        $etudiant->delete();

        // Retourner une réponse JSON ou une réponse de redirection si nécessaire
        return response()->json(['success' => 'Etudiant supprimé avec succès']);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin_salarie' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
            'matricule_cnss' => 'required|string|max:255',
            'mail' => 'required|email|max:255',
            'RIB' => 'required|string|max:255',
            'type_contrat' => 'required|string|max:255',
            'RIB_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'contrat_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'cv_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'cin_pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $personnel = new Personnel($validatedData);

        if ($request->hasFile('RIB_pdf')) {
            $file = $request->file('RIB_pdf');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('asset/images'), $fileName);
            $personnel->RIB_pdf = $fileName;
        }
        if ($request->hasFile('contrat_pdf')) {
            $file = $request->file('contrat_pdf');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('asset/images'), $fileName);
            $personnel->contrat_pdf = $fileName;
        }
        if ($request->hasFile('cv_pdf')) {
            $file = $request->file('cv_pdf');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('asset/images'), $fileName);
            $personnel->cv_pdf = $fileName;
        }
        if ($request->hasFile('cin_pdf')) {
            $file = $request->file('cin_pdf');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('asset/images'), $fileName);
            $personnel->cin_pdf = $fileName;
        }

        $personnel->save();

        return redirect()->back()->with('success', 'Personnel ajouté avec succès!');
    }
}
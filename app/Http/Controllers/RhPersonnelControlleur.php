<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

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
        'id', 'matricule_cnss', 'RIB', 'nom', 'prenom', 'etablissement',
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
                        <button type="button" class="btn btn-primary edit-btn" data-id="' . $personnel->id . '" style="width:auto; background-color: #173165;">Modifier</button>
                        <form id="delete-form-' . $personnel->id . '" action="' . route('personnel.destroy', $personnel->id) . '" method="POST" style="margin: 0;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="button" class="btn btn-danger" onclick="confirmDelete(\'' . $personnel->id . '\')" style="width:auto;">Supprimer</button>
                        </form>
                    </div>';
        })
        
        
       
        ->rawColumns(['RIB_pdf', 'contrat_pdf', 'cv_pdf', 'cin_pdf', 'actions'])
        ->make(true);
}

public function updatePersonnel(Request $request)
{
    // Récupérer le personnel à partir de l'ID
    $personnel = Personnel::where('id', $request->id)->firstOrFail();

    // Mettre à jour les informations du personnel avec les données du formulaire
    $personnel->nom = $request->nom;
    $personnel->prenom = $request->prenom;
    $personnel->matricule_cnss = $request->matricule_cnss;
    $personnel->etablissement = $request->etablissement;
    $personnel->RIB = $request->RIB;
    $personnel->type_contrat = $request->type_contrat;

    $personnel->save();

    return redirect()->back()->with('success', 'Les informations du personnel ont été mises à jour avec succès.');
}


public function destroy($id)
{
    // Find the personnel by cin_salarie
    $personnel = Personnel::where('id', $id)->firstOrFail();

    // Delete the personnel
    $personnel->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Personnel supprimé avec succès.');
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
        $personnel->cin_salarie = Hash::make($request->cin_salarie);

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
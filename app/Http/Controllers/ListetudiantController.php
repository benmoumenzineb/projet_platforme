<?php

namespace App\Http\Controllers;

use App\Models\Etudians;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables; 
use Illuminate\Support\Facades\DB;

use App\Models\Inscription;

class ListetudiantController extends Controller
{
    public function index()
    {
        
        $etudiants = Etudians::paginate(10); 

        
    return view('scolarite.views.listeetudiant', ['etudiants' => $etudiants]);


    }

    
    public function fetchEtudiants()
    {
        $etudiant = Etudians::select(['id', 'CNE', 'CNI', 'Nom', 'Prenom','telephone','Email','Adresse', 'Annee_bac', 'Sexe', 'Date_naissance', 'Pays',  'Serie_bac', 'Specialite_diplome', 'Mention_bac', 'Etablissement_bac', 'Pourcentage_bourse']);
    
        return DataTables::of($etudiant)
            ->addIndexColumn()
            ->addColumn('actions', function($etudiant) {
                return '<div style="display: flex; gap: 5px;">
                        <button type="button" class="btn btn-primary edit-btn" data-id="' . $etudiant->id . '" style="width:auto; background-color: #173165;">Modifier</button>
                        <form id="delete-form-' . $etudiant->id . '" action="' . route('etudiants.destroy', $etudiant->id) . '" method="POST" style="margin: 0;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="button" class="btn btn-danger" onclick="confirmDelete(' . $etudiant->id . ')" style="width:auto;">Supprimer</button>
                        </form>
                    </div>';
        })
               
     
            ->rawColumns(['actions'])
            ->make(true);
    }
    
    
    
    
    public function update(Request $request)
    {
        $etudiant = Etudians::find($request->id);
        $etudiant->Nom = $request->Nom;
        $etudiant->Prenom = $request->Prenom;
        $etudiant->CNE = $request->CNE;
        $etudiant->CNI = $request->CNI;
        $etudiant->Date_naissance = $request->Date_naissance;
        $etudiant->Pays = $request->Pays;
        $etudiant->Email = $request->Email;
        $etudiant->Adresse = $request->Adresse;
        $etudiant->Serie_bac = $request->Serie_bac;
        $etudiant->Mention_bac = $request->Mention_bac;
        $etudiant->Etablissement_bac = $request->Etablissement_bac;
        $etudiant->Pourcentage_bourse = $request->Pourcentage_bourse;
        // Mettez à jour d'autres champs si nécessaire
        $etudiant->save();
    
        return redirect()->back()->with('success', 'Informations de l\'étudiant mises à jour avec succès.');
    }
    

    
  

 




    public function ajouterEtudiant(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'apogee' =>'required',
            'Nom' => 'required|string',
            'Prenom' => 'required|string',
            'CNE' => 'required|string',
            'CNI' => 'required|string',
            'Sexe' => 'required|string',
            'Date_naissance' => 'required|date',
            'Pays' => 'required|string',
            'Email' => 'required|string',
            'telephone' => 'required',
            'Adresse' => 'required|string',
            'Serie_bac' => 'required|string',
            
            'Specialite_diplome' => 'nullable|string',
            'Mention_bac' => 'required|string',
            'Etablissement_bac' => 'required|string',
            'Pourcentage_bourse' => 'required|string',
        ]);

       
        $etudiant = new Etudians([
            
            'Nom' => $request->input('Nom'),
            'Prenom' => $request->input('Prenom'),
            'CNE' => $request->input('CNE'),
            'CNI' => $request->input('CNI'),
            'Sexe' => $request->input('Sexe'),
            'Date_naissance' => $request->input('Date_naissance'),
            'Pays' => $request->input('Pays'),
            'Diplome_acces' => $request->input('Diplome_acces'),
            'Serie_bac' => $request->input('Serie_bac'),
            'Email' => $request->input('Email'),
            'Adresse' => $request->input('Adresse'),
            'telephone' => $request->input('telephone'),
           
            'Specialite_diplome' => $request->input('Specialite_diplome'),
            'Mention_bac' => $request->input('Mention_bac'),
            'Etablissement_bac' => $request->input('Etablissement_bac'),
            'Pourcentage_bourse' => $request->input('Pourcentage_bourse'),
            
        ]);

      
        

        $request->validate([ 
            'num_annee' => 'required',
        ]);
        $etudiant = new Inscription([
            'num_annee' => $request->input('num_annee'),
        ]);
        $etudiant->save();

        return redirect()->route('listetudiant')->with('success', 'Étudiant ajouté avec succès.');
    }
    
   
    public function destroy($id)
    {
        $etudiant = Etudians::find($id);
    
        if ($etudiant) {
            $etudiant->delete();
            return redirect('/scolarite')->with('success', 'Student deleted successfully.');
        } else {
            return redirect('/scolarite')->with('error', 'Student not found.');
        }
    }
    
    
    
}
       
    


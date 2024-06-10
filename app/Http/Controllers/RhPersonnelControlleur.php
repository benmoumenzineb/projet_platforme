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
        $personnel = Personnel::select(['cin_salarie','matricule_cnss','RIB', 'nom', 'prenom', 'etablissement']);

        return DataTables::of($personnel)
        ->addIndexColumn()
        ->addColumn('actions', function($personnel) {
            return '<div style="display: flex; gap: 5px;">
                    <button type="button" class="btn btn-primary edit-btn" data-id="' . $personnel->cin_salarie . '" style="width:auto; background-color: #173165;">Modifier</button>
                                           <form id="delete-form-' .  $personnel->cin_salarie. '" action="' . route('personnel.destroy',  $personnel->cin_salarie) . '" method="POST" style="margin: 0;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="button" class="btn btn-danger" onclick="confirmDelete(' .  $personnel->cin_salarie. ')" style="width:auto;">Supprimer</button>
                        </form>
                </div>';
    })
           
 
        ->rawColumns(['actions'])
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


    public function ajouterPersonnel(Request $request)
{
    // Valider les données du formulaire
    $request->validate([
        'Nom' => 'required|string',
        'Prenom' => 'required|string',
        'CNE' => 'required|string',
        'CNI' => 'required|string',
        'Sexe' => 'required|string',
        'Date_naissance' => 'required|date',
        'Pays' => 'required|string',
        'Diplome_acces' => 'required|string',
        'Serie_bac' => 'required|string',
        'Date_inscription' => 'required',
        'Specialite_diplome' => 'nullable|string',
        'Mention_bac' => 'required|string',
        'Etablissement_bac' => 'required|string',
        'Pourcentage_bourse' => 'required|string',
    ]);

    // Créer un nouvel objet Etudians avec les données du formulaire
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
        'Date_inscription' => $request->input('Date_inscription'),
        'Specialite_diplome' => $request->input('Specialite_diplome'),
        'Mention_bac' => $request->input('Mention_bac'),
        'Etablissement_bac' => $request->input('Etablissement_bac'),
        'Pourcentage_bourse' => $request->input('Pourcentage_bourse'),
        // Ajoutez ici les autres champs du formulaire
    ]);

    // Sauvegarder l'étudiant dans la base de données
    $etudiant->save();

    // Rediriger l'utilisateur vers une autre page avec un message de succès
    return redirect()->route('listPersonnel')->with('success', 'Étudiant ajouté avec succès.');
}}
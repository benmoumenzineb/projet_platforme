<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;

class RhPersonnelControlleur extends Controller
{
    



   
    public function index()
    {
        
        $etudiants = Etudians::paginate(10); 

        
    return view('RH.views.rhpersonnel', ['etudiants' => $etudiants]);


    }

    
    public function fetchPersonnel()
    {
        $etudiant = Etudians::select(['id', 'apogee', 'CNE', 'CNI', 'Nom', 'Prenom','Sexe','Date_naissance','Pays','Diplome_acces','Serie_bac','Date_inscription','Specialite_diplome','Mention_bac','Etablissement_bac','Pourcentage_bourse']);
    
        return DataTables::of($etudiant)
        ->addColumn('actions', function ($etudiant) {
            return '<div class="btn-group" role="group" aria-label="Actions">' .
                    '<a href="#" class="edit-btn">' .
                    '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" style="color: #173165;">' .
                        '<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>' .
                        '<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>' .
                    '</svg>' .
                '</a>'.
                '<a href="#" class="delet-btn">' .
                    '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16" style="color:#173165;">' .
                        '<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>' .
                    '</svg>' .
                '</a>' .
            '</div>';
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
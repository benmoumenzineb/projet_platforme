<?php

namespace App\Http\Controllers;

use App\Models\Etudians;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Inscription;
use App\Models\Etablissement;
use App\Models\Filiere;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class ListetudiantController extends Controller
{
    

    public function index()
    {
        $filieres=Filiere::all();
        $etablissements = Etablissement::all();
        $user = Auth::guard('scolarite')->user();
        $etudiants = Etudians::paginate(10); 

        
    return view('scolarite.views.listeetudiant',compact('etablissements','filieres') );


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
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'id' => 'required|integer|exists:etudient,id',
        'Nom' => 'required|string|max:255',
        'Prenom' => 'required|string|max:255',
        'CNE' => 'required|string|max:20',
        'CNI' => 'required|string|max:20',
        'Date_naissance' => 'required|date',
        'Pays' => 'required|string|max:100',
        'Email' => 'required|email|max:255',
        'Adresse' => 'required|string|max:255',
        'Serie_bac' => 'required|string|max:50',
        'Mention_bac' => 'required|string|max:50',
        'Etablissement_bac' => 'required|string|max:100',
        'Pourcentage_bourse' => 'required',
    ]);

    try {
        // Trouver l'étudiant par ID ou lever une exception si non trouvé
        $etudiant = Etudians::findOrFail($validatedData['id']);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(['error' => 'Étudiant non trouvé.'], 404);
    }

    // Mettre à jour les informations de l'étudiant
    $etudiant->update($validatedData);

    // Retourner une réponse JSON en cas de succès
    return response()->json(['success' => 'Informations de l\'étudiant mises à jour avec succès.'], 200);
}


    
public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'Nom' => 'required|string',
            'Prenom' => 'required|string',
            'CNE' => 'required|string',
            'CNI' => 'required|string',
            'Sexe' => 'required|string',
            'Date_naissance' => 'required|date',
            'Pays' => 'required|string',
            'Email' => 'required|string',
            'telephone' => 'required|string',
            'Adresse' => 'required|string',
            'Serie_bac' => 'required|string',
            'cinTuteur' => 'required|string',
            'nom_tuteur' => 'required|string',
            'proffesion_tuteur' => 'required|string',
            'telephone_tuteur' => 'required|string',
            'Specialite_diplome' => 'nullable|string',
            'Mention_bac' => 'required|string',
            'Etablissement_bac' => 'required|string',
            'Pourcentage_bourse' => 'required|string',
            'num_annee' => 'required|string',
            'code_etab' => 'required|string',
            'id_filiere' => 'required|integer', // Ajout de la validation pour id_filiere
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $dateInscription = $request->input('num_annee');
            $apogee = $this->generateApogee($dateInscription);
            $code_etab = $request->input('code_etab'); // Récupérer code_etab depuis la requête
            $id_filiere = $request->input('id_filiere'); // Récupérer id_filiere depuis la requête

            // Créer l'inscription
            Inscription::create([
                'apogee' => $apogee,
                'num_annee' => $dateInscription,
                'code_etab' => $code_etab, // Utiliser code_etab récupéré
                'id_filiere' => $id_filiere, // Utiliser id_filiere récupéré
            ]);

            // Créer l'étudiant
            Etudians::create([
                'apogee' => $apogee,
                'Nom' => $request->input('Nom'),
                'Prenom' => $request->input('Prenom'),
                'CNE' => $request->input('CNE'),
                'CNI' => $request->input('CNI'),
                'Sexe' => $request->input('Sexe'),
                'Date_naissance' => $request->input('Date_naissance'),
                'Pays' => $request->input('Pays'),
                'Email' => $request->input('Email'),
                'telephone' => $request->input('telephone'),
                'Adresse' => $request->input('Adresse'),
                'cinTuteur' => $request->input('cinTuteur'),
                'Serie_bac' => $request->input('Serie_bac'),
                'proffesion_tuteur' => $request->input('proffesion_tuteur'),
                'nom_tuteur' => $request->input('nom_tuteur'),
                'telephone_tuteur' => $request->input('telephone_tuteur'),
                'Specialite_diplome' => $request->input('Specialite_diplome'),
                'Mention_bac' => $request->input('Mention_bac'),
                'Etablissement_bac' => $request->input('Etablissement_bac'),
                'Pourcentage_bourse' => $request->input('Pourcentage_bourse'),
                'code_etab' => $code_etab, // Utiliser code_etab récupéré
            ]);

            return response()->json(['message' => 'Étudiant ajouté avec succès', 'apogee' => $apogee], 201);

        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'ajout de l\'étudiant : ' . $e->getMessage());
            return response()->json(['message' => 'Erreur lors de l\'ajout de l\'étudiant', 'error' => $e->getMessage()], 500);
        }
    }

    private function generateApogee($dateInscription)
{
    // Obtenez l'année de la date d'inscription
    $year = date('Y', strtotime($dateInscription));
    
    // Générer un nombre aléatoire de 4 chiffres
    $randomNumber = mt_rand(1000, 9999); // Générer un nombre aléatoire entre 1000 et 9999
    
    // Combiner l'année et le nombre aléatoire pour obtenir un code de 8 chiffres
    return $year . $randomNumber;
}






    
    
    public function destroy($id)
{
    // Find the personnel by cin_salarie
    $etudiant = Etudians::where('id', $id)->firstOrFail();

    // Delete the personnel
    $etudiant->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'etudiant supprimé avec succès.');
}
    
}
       
    


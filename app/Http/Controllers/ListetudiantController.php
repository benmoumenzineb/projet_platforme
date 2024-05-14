<?php

namespace App\Http\Controllers;

use App\Models\Etudians;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables; 

class ListetudiantController extends Controller
{
    public function index()
    {
        
        $etudiants = Etudians::paginate(10); 

        return view('scolarite.views.listeetudiant', compact('etudiants')); 
    }

    
    public function fetchEtudiants()
    {
        $etudiants = Etudians::select(['apogee', 'CNE', 'CNI', 'Nom', 'Prenom','Sexe','Date_naissance','Pays','Diplome_acces','Serie_bac','Date_inscription','Specialite_diplome','Mention_bac','Etablissement_bac','Pourcentage_bourse']);

        return DataTables::of($etudiants)
            ->addColumn('actions', function ($etudiant) {
                // Ajoutez ici le code pour les actions (par exemple, le bouton d'édition)
                return '<button class="btn btn-sm btn-primary edit-btn" data-id="' . $etudiant->id . '">Éditer</button>';
            })
            ->rawColumns(['actions'])
            ->make(true);}
    
}


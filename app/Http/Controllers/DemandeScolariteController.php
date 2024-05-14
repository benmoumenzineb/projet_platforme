<?php

namespace App\Http\Controllers;
use App\Models\Demande;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables; 
class DemandeScolariteController extends Controller
{
    public function index()
    {
        $demande = Demande::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.demandescolarite', compact('demande'));
    }
   
    public function demandeEtudiants()
    {
        $demande = Demande::select(['Nom', 'Prenom','Numero','Email','Type']);
    
        return DataTables::of($demande)
            ->addColumn('actions', function ($demande) {
                // Ajoutez ici le code pour les actions (par exemple, les boutons d'édition)
                return '<div class="btn-group" role="group" aria-label="Actions">' .
                       '<input type="button" class="btn btn-success" value="OUI" onclick="validerDemande(' . $demande->id . ')" style="width: 70px; margin-right: 5px;">' .
                       '<input type="button" class="btn btn-danger" value="NON" onclick="nonValiderDemande(' . $demande->id . ')" style="width: 70px;">' .
                       '</div>';
              
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    
    
    
}
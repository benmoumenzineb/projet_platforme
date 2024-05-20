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
            ->make(true);
    }
    
    
    
}
<?php

namespace App\Http\Controllers;
use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeScolariteController extends Controller
{
    public function index()
    {
        $demande = Demande::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.demandescolarite', ['demandes' => $demande]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $demandes = Demande::where('Nom', 'like', "%$query%")
                              ->orWhere('Prenom', 'like', "%$query%")
                              ->orWhere('Numero', 'like', "%$query%")
                              ->orWhere('Email', 'like', "%$query%")
                              ->orWhere('Type', 'like', "%$query%")
                              ->paginate(10);
        return view('scolarite.views.demandescolarite', compact('demandes'));
    }
}
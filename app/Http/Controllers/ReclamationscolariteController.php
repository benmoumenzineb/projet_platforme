<?php

namespace App\Http\Controllers;
use App\Models\Reclamation;
use Illuminate\Http\Request;

class ReclamationscolariteController extends Controller
{
  


    public function index()
    {
        $reclamation = Reclamation::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.reclamationscolarite', ['reclamations' => $reclamation]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $reclamations = Reclamation::where('Nom', 'like', "%$query%")
                              ->orWhere('Prenom', 'like', "%$query%")
                              ->orWhere('Numero', 'like', "%$query%")
                              ->orWhere('Email', 'like', "%$query%")
                              ->orWhere('Type', 'like', "%$query%")
                              ->paginate(10);
        return view('scolarite.views.reclamationscolarite', compact('reclamations'));
    }
}


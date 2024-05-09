<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;

class ListetudiantController extends Controller
{
    public function index()
    {
        $etudians = Etudians::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.listeetudiant', ['etudians' => $etudians]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $etudians = Etudians::where('Nom', 'like', "%$query%")
                              ->orWhere('CNE', 'like', "%$query%")
                              ->orWhere('apogee', 'like', "%$query%")
                              ->orWhere('CNI', 'like', "%$query%")
                              ->orWhere('Prenom', 'like', "%$query%")
                              ->orWhere('Date_naissance', 'like', "%$query%")
                              ->orWhere('Date_inscription', 'like', "%$query%")
                              ->paginate(10);
        return view('scolarite.views.listeetudiant', compact('etudians'));
    }
    
}

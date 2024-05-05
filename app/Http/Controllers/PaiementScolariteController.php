<?php

namespace App\Http\Controllers;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementScolariteController extends Controller
{
    public function index()
    {
        $paiement = Paiement::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.paiementscolarite', ['paiements' => $paiement]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $paiements = Paiement::where('nom', 'like', "%$query%")
                              ->orWhere('prenom', 'like', "%$query%")
                              ->orWhere('filiere', 'like', "%$query%")
                              ->orWhere('cni', 'like', "%$query%")
                              ->orWhere('n_telephone', 'like', "%$query%")
                              ->orWhere('choix', 'like', "%$query%")
                              ->orWhere('mode_paiement', 'like', "%$query%")
                              ->orWhere('mois_concerne', 'like', "%$query%")
                              ->paginate(10);
        return view('scolarite.views.paiementscolarite', compact('paiements'));
    }
}

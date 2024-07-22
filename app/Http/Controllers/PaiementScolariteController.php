<?php

namespace App\Http\Controllers;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables; 
class PaiementScolariteController extends Controller
{
    public function index()
    {
        $paiement = Paiement::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.paiementscolarite', compact('paiement'));
    }
    public function paiementEtudiants(Request $request)
    {
        $filiere = $request->input('intitule'); // Obtenir la filière à partir de la requête
    
        $paiement = Paiement::select(['id_paiement', 'date_paiement', 'nom', 'prenom', 'intitule', 'apogee', 'n_telephone', 'Email', 'cni', 'montant', 'image', 'mois_concerne', 'mode_paiement', 'choix']);
    
        // Appliquer le filtre par filière si une filière est sélectionnée
        if (!empty($filiere)) {
            $paiement->where('intitule', $filiere);
        }
    
        return DataTables::of($paiement)
        ->addColumn('Nom', function($demande) {
            return $demande->etudient ? $demande->etudient->Nom : '';
        })
        ->addColumn('Prenom', function($demande) {
            return $demande->etudient ? $demande->etudient->Prenom : '';
        })
            ->addColumn('image', function ($paiement) {
                // Si le fichier est une image
                if (strpos($paiement->image, '.jpg') !== false ||
                    strpos($paiement->image, '.jpeg') !== false ||
                    strpos($paiement->image, '.png') !== false ||
                    strpos($paiement->image, '.gif') !== false) {
                    // Retourner un lien vers l'image avec le nom du fichier
                    return '<a href="' . asset('asset/images/' . $paiement->image) . '" target="_blank">' . $paiement->image . '</a>';
                } else {
                    // Sinon, retourner simplement le nom du fichier avec un lien
                    return '<a href="' . asset('asset/images/' . $paiement->image) . '" target="_blank">' . $paiement->image . '</a>';
                }
            })
            ->rawColumns(['image'])
            ->make(true);
    }
    
}

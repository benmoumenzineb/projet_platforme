<?php

namespace App\Http\Controllers;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementetudiantController extends Controller
{
    public function index()
    {
        
        return view('etudiant.views..paiementetudiant');}
        public function enregistrerPaiement(Request $request)
        {
            // Validation des données du formulaire
            $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'filiere' => 'required',
                'cni' => 'required',
                'n_telephone' => 'required',
                'montant' => 'required',
                'choix' => 'required',
                'mode_paiement' => 'required',
                'mois_concerne'=>'required',
            ]);
    
            // Création d'une nouvelle réclamation
            $paiement = new Paiement();
            $paiement->nom = $request->nom;
            $paiement->prenom = $request->prenom;
            $paiement->filiere = $request->filiere;
            $paiement->cni = $request->cni;
            $paiement->n_telephone= $request->n_telephone;
            $paiement->montant = $request->montant;
            $paiement->choix = $request->choix;
            $paiement->mode_paiement = $request->mode_paiement;
            $paiement->mois_concerne= $request->mois_concerne;
            
    
            // Enregistrement de la réclamation dans la base de données
            $paiement->save();
            return redirect()->route('paiement')->with('success', '"Votre paiement a été enregistré avec succès.');
}
}
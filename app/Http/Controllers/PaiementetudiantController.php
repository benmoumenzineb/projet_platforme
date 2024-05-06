<?php

namespace App\Http\Controllers;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementetudiantController extends Controller
{
    public function index()
    {
        return view('etudiant.views.paiementetudiant');
    }
    
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
            'image' => 'nullable|max:2048',
            'Email'=>'required', // Validation de l'image
        ]);

        // Création d'un nouveau paiement
        $paiement = new Paiement();
        $paiement->nom = $request->nom;
        $paiement->prenom = $request->prenom;
        $paiement->filiere = $request->filiere;
        $paiement->cni = $request->cni;
        $paiement->n_telephone = $request->n_telephone;
        $paiement->montant = $request->montant;
        $paiement->choix = $request->choix;
        $paiement->mode_paiement = $request->mode_paiement;
        $paiement->Email = $request->Email;

        // Gérer les mois sélectionnés
        $moisSelectionnes = array_filter($request->mois_concerne);
        $moisConcerne = implode(',', $moisSelectionnes);
        $paiement->mois_concerne = $moisConcerne;

        // Gérer l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('asset/images'), $imageName); // Stockez l'image dans le dossier public/asset/images
            $paiement->image = $imageName; // Stockez le nom de l'image dans la base de données
        }

        // Enregistrer le paiement dans la base de données
        $paiement->save();
        return redirect()->route('paiement')->with('success', 'Votre paiement a été enregistré avec succès.');
    }
}

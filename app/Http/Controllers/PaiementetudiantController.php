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
                'image' => 'nullable|max:2048', // Validation de l'image
            ]);
    
            // Création d'une nouvelle réclamation
            $paiement = new Paiement();
            $paiement->nom = $request->nom;
            $paiement->prenom = $request->prenom;
            $paiement->filiere = $request->filiere;
            $paiement->cni = $request->cni;
            $paiement->n_telephone = $request->n_telephone;
            $paiement->montant = $request->montant;
            $paiement->choix = $request->choix;
            $paiement->mode_paiement = $request->mode_paiement;
           
           
           // Filtrer les valeurs réelles des cases cochées
    $moisSelectionnes = array_filter($request->mois_concerne);

    // Convertir les mois sélectionnés en une chaîne séparée par des virgules
    $moisConcerne = implode(',', $moisSelectionnes);
dd($moisSelectionnes);
         
            // Récupérez les mois sélectionnés
            
           
            // Parcourez les mois sélectionnés et associez-les au paiement dans la base de données
            // Parcourez les mois sélectionnés et associez-les au paiement dans la base de données
           

            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('images', $imageName); // Stockez l'image dans le dossier 'storage/app/images'
                $paiement->image = $imageName; // Stockez le chemin de l'image dans la base de données
            }
            
           
           
            
            
            // Enregistrement de la réclamation dans la base de données
           
            $paiement->save();
            return redirect()->route('paiement')->with('success', '"Votre paiement a été enregistré avec succès.');
}
}
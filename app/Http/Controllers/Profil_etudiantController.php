<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class Profil_etudiantController extends Controller
{
    public function index()
    {
        
        return view('etudiant.views.Profil_etudiant');
    }

    public function enregistrerReclamation(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
       //name
     
      'Etablissement' => 'required',
        'Code_Apogee' => 'required',
        'Cne' => 'required',
        'Cycle' => 'required',
        'Date_inscription' => 'required',
        'Nom' => 'required',
        'Prenom'=> 'required',
       
        'Date_naissance'=> 'required',
        'Sexe'=> 'required',
        'Lieu_naissance'=> 'required', 
        'Cni'=> 'required',
        'Adresse'=> 'required',
        'Email'=> 'required',
        'Telephone'=> 'required',
        'Nom_pere'=> 'required',
        'Prenom_pere'=> 'required',
        'Prefession_pere'=> 'required',
        'Telephone_pere'=> 'required',
        'Nom_mere'=> 'required',
        'Prenom_mere'=> 'required',
        'Prefession_mere'=> 'required',
        'Telephone_mere'=> 'required',
        'Nom_tuteur'=> 'required',
        'Telephone_tuteur'=> 'required',
    
        ]);

        /* 
    
 */
        // Création d'une nouvelle réclamation
        $profil = new Etudiant();
        $profil->Etablissement = $request->Etablissement;
        $profil->Code_Apogee = $request->Code_Apogee;
        $profil->Cne = $request->Cne;
        $profil->Cycle = $request->Cycle;
        $profil->Date_inscription = $request->Date_inscription;
         $profil->Nom = $request->Nom;
         $profil->Prenom = $request->Prenom;
         $profil->Date_naissance = $request->Date_naissance;
         $profil->Sexe = $request->Sexe;
         $profil->Lieu_naissance = $request->Lieu_naissance;
         $profil->Cni = $request->Cni;
         $profil->Adresse = $request->Adresse;
          $profil->Email = $request->Email;
          $profil->Telephone = $request->Telephone;
        $profil->Nom_pere = $request->Nom_pere;
        $profil->Prenom_pere = $request->Prenom_pere;
        $profil->Prefession_pere = $request->Prefession_pere;
        $profil->Telephone_pere = $request->Telephone_pere;
        $profil->Nom_mere = $request->Nom_mere;
        $profil->Prenom_mere= $request->Prenom_mere;
        $profil->Prefession_mere = $request->Prefession_mere;
        $profil->Telephone_mere = $request->Telephone_mere;
        $profil->Nom_tuteur = $request->Nom_tuteur;
        $profil->Telephone_tuteur = $request->Telephone_tuteur;
        // Enregistrement de la réclamation dans la base de données


       
        $profil->save();

        return redirect()->route('Profil_etudiant')->with('success', 'Les données  enregistrée avec succès.');
        
    }
}

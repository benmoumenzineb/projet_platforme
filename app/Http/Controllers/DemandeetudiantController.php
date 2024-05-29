<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Demande;
class DemandeetudiantController extends Controller
{
    public function index(){
        $user = Auth::guard('etudient')->user();
       
        return view ('etudiant.views.demandetudiant',compact('user'));}
        public function enregistrerDemande(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
       //name
       'Nom' => 'required',
       'Prenom' => 'required',
       'Numero' => 'required',
       'Email' => 'required|email',
       'Type' => 'required',
      
        ]);

        // Création d'une nouvelle réclamation
        $demande = new Demande();
         $demande->Nom = $request->Nom;
         $demande->Prenom = $request->Prenom;
         $demande->Numero = $request->Numero;
          $demande->Email = $request->Email;
        $demande->Type = $request->Type;
       
        // Enregistrement de la réclamation dans la base de données
        $demande->save();

        return redirect()->route('demande')->with('success', 'Demande enregistrée avec succès.');
        
    }
}

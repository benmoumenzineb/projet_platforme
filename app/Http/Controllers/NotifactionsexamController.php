<?php

namespace App\Http\Controllers;
use App\Models\Programme_Evaluation;
use Illuminate\Http\Request;

class NotifactionsexamController extends Controller
{
    public function index()
    {
        return view('scolarite.views.notificationsexam');
    }
    public function enregistrercahiertext(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
           //name
           'Cycle' => 'required',
           'Filiere' => 'required',
           'Groupe' => 'required',
           'Niveau' => 'required',
           'Nom_Element' => 'required',
           'Date_exam' => 'required',
           'heure_exam' => 'required',
           'Date_ratt' => 'required',
           'heure_ratt' =>'required',
           'Description' =>'required',
        ]);
    
        // Création d'une nouvelle séance
        $evaluation = new Programme_Evaluation();
        $evaluation->Cycle = $request->Cycle;
        $evaluation->Filiere = $request->Filiere;
        $evaluation->Groupe = $request->Groupe;
        $evaluation->Niveau = $request->Niveau;
        $evaluation->Nom_Element = $request->Nom_Element;
        $evaluation->Date_exam = $request->Date_exam;
        $evaluation->heure_exam= $request->heure_exam;
        $evaluation->Date_ratt = $request->Date_ratt;
        $evaluation->heure_ratt= $request->heure_ratt;
        $evaluation->Description= $request->Desciption;
    
        // Enregistrement de la séance dans la base de données
        $evaluation->save();
    
        // Génération et téléchargement du fichier PDF
        
    
        // Redirection avec message de succès
        return redirect()->route('enregnotificationsexam')->with('success', 'Cahier de texte enregistré avec succès.');
    }
}

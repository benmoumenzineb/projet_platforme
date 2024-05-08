<?php

namespace App\Http\Controllers;
use App\Models\seance;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;


class FormtelechargerController extends Controller
{
    public function enregistrercahiertext(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
           //name
           'Cycle' => 'required',
           'Filiere' => 'required',
           'Groupe' => 'required',
           'Niveau' => 'required',
           'Matiere' => 'required',
           'nom_enseignant' => 'required',
           'horaire' => 'required',
           'Date' => 'required',
           'Activites' =>'required',
        ]);
    
        // Création d'une nouvelle séance
        $seance = new seance();
        $seance->Cycle = $request->Cycle;
        $seance->Filiere = $request->Filiere;
        $seance->Groupe = $request->Groupe;
        $seance->Niveau = $request->Niveau;
        $seance->Matiere = $request->Matiere;
        $seance->horaire = $request->horaire;
        $seance->Date= $request->Date;
        $seance->nom_enseignant = $request->nom_enseignant;
        $seance->Activites= $request->Activites;
    
        // Enregistrement de la séance dans la base de données
        $seance->save();
    
        // Génération et téléchargement du fichier PDF
        $this->telechargerFichier($request);
    
        // Redirection avec message de succès
        return redirect()->route('enregistrercahiertext')->with('success', 'Cahier de texte enregistré avec succès.');
    }
    public function telechargerFichier(Request $request)
    {
        // Obtenir les données du formulaire
        $donnees = $request->all();

        // Construire le contenu HTML du fichier
        $contenu = "<h3>CAHIER DE TEXTES</h3>";
        $contenu .= "<img src='" . asset('asset/images/logo_img.png') . "' alt='Logo' width='100px'><br><br>";
        

        // Ajouter les données du formulaire
        $contenu .= "<strong>Cycle :</strong> " . $donnees['Cycle'] . "<br>";
        $contenu .= "<strong>Filière :</strong> " . $donnees['Filiere'] . "<br>";
        $contenu .= "<strong>Groupe :</strong> " . $donnees['Groupe'] . "<br>";
        $contenu .= "<strong>Niveau :</strong> " . $donnees['Niveau'] . "<br>";
        $contenu .= "<strong>Matière :</strong> " . $donnees['Matiere'] . "<br>";
        $contenu .= "<strong>Enseignant :</strong> " . $donnees['nom_enseignant'] . "<br>";
        $contenu .= "<strong>Horaire :</strong> " . $donnees['horaire'] . "<br>";
        $contenu .= "<strong>Date Seance :</strong> " . $donnees['Date'] . "<br>";
        $contenu .= "<strong>Activités objectifs de la séance :</strong> " . $donnees['Activites'] . "<br>";

        // Convertir le contenu HTML en PDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($contenu);
        $dompdf->setPaper('A4', 'portrait');

        // Rendre le PDF
        $dompdf->render();

        // Télécharger le fichier PDF
        return $dompdf->stream('Cahierdetextes.pdf');
    }
   
}

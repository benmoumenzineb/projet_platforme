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
        $contenu = "
        <!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Cahier de textes</title>
            <style>
                /* Votre style CSS ici */
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                   
                }
                .container {
                    max-width: 800px;
                    margin: 50px auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 8px;
                    
                }
                h3 {
                    font-weight: bold;
                    font-size: 30px;
                    text-align: center;
                    color: #173165;
                    margin-bottom: 20px;
                }
                img {
                    display: block;
                    margin: 0 auto;
                    width: 100px;
                    height: auto;
                    margin-bottom: 20px;
                }
                .info {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .info p {
                    margin: 10px;
                }
                .strong-label {
                    font-weight: bold;
                    font-size:18px;
                    color: #173165;
                }
                .seance-info {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 10px;
                }
                .seance-info p {
                    margin: 5px;
                }
                .activites {
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h3>CAHIER DE TEXTES</h3>
                <img src='" . asset('asset/images/logo.webp') . "' alt='Logo'>
                <div class='info'>
                    <p><span class='strong-label'>Cycle :</span> " . htmlspecialchars($donnees['Cycle']) . " </p>
                    <p><span class='strong-label'>Filière :</span> " . htmlspecialchars($donnees['Filiere']) . " </p>
                    <p><span class='strong-label'>Groupe :</span> " . htmlspecialchars($donnees['Groupe']) . " </p>
                    <p><span class='strong-label'>Niveau :</span> " . htmlspecialchars($donnees['Niveau']) . " </p>
                    <p><span class='strong-label'>Matière :</span> " . htmlspecialchars($donnees['Matiere']) . " </p>
                </div>
                <hr>
                <div class='seance-info'>
                    <p><span class='strong-label enseignant'>Enseignant :</span> " . htmlspecialchars($donnees['nom_enseignant']) . " </p>
                    <p><span class='strong-label'>Horaire :</span> " . htmlspecialchars($donnees['horaire']) . " </p>
                    <p><span class='strong-label date'>Date Séance :</span> " . htmlspecialchars($donnees['Date']) . " </p>
                </div>
                <p class='activites'><span class='strong-label'>Activités objectifs de la séance :</span> " . htmlspecialchars($donnees['Activites']) . " </p>
            </div>
        </body>
        </html>
    ";

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

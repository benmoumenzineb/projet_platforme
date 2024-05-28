<?php

namespace App\Http\Controllers;
use App\Models\Seance;
use App\Models\Groupe;
use App\Models\Element;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;


class FormtelechargerController extends Controller
{
    public function enregistrercahiertext(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
          
        ]);
    $donnees = $request->all();

    $hd = $request->input('hd');
    $hf = $request->input('hf');
    $date= $request->input('date');
    $activite = $request->input('activite');

    // Ajuster les valeurs des champs dans le tableau $donnees
    $donnees['heure_depart'] = $hd;
    $donnees['heure_fin'] = $hf;
    $donnees['date_seance'] = $date;
    $donnees['objectif'] = $activite;

    // Effectuez les vérifications nécessaires et insérez les données dans la base de données
    // Exemple de vérification pour la matière
    $matiereExistante = Element::where('intitule', $donnees['matiere'])->first();
    if ($matiereExistante) {
        // Stockez le numéro de l'élément dans la table Seance
        $donnees['num_element'] = $matiereExistante->num_element;
    }

    // Vérification pour le groupe
    $groupeExistante = Groupe::where('intitule', $donnees['groupe'])->first();
    if ($groupeExistante) {
        // Stockez l'id du groupe dans la table Seance
        $donnees['id_groupe'] = $groupeExistante->id;
    }

    // Autres vérifications et opérations similaires pour la filière, le cycle, le niveau, l'enseignant, etc.

    // Enregistrez les données dans la table Seance
    Seance::create($donnees);

     

    // Redirigez l'utilisateur ou renvoyez une réponse JSON en fonction de vos besoins
    return response()->json(['message' => 'Les données ont été enregistrées avec succès'], 200);
}
       
       
       
    public function telechargerFichier(Request $request)
    {
        // Obtenir les données du formulaire
        $donnees = $request->all();
       // Utilisez public_path() pour obtenir le chemin absolu complet vers l'image


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
            width: 120px;
            height: 70px;
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
    <img src='{{ asset('asset/images/logo_img.png') }}' alt='Logo'>

        <h3>CAHIER DE TEXTES</h3>
        
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

    // Convertir le contenu HTML en PDF
   
    
}
}
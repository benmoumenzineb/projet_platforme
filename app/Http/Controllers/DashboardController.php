<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use App\Models\Personnel;
use App\Models\Filiere;
use App\Models\Element;
use App\Models\Inscription;
use App\Models\Demande;
use App\Models\Reclamation;
use App\Models\Enseignant;
use App\Models\Etablissement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('Admin.views.homeadmin');
    }





    public function dashboard()
    {
        $etudiantsCount = Etudians::count();
        $personnelCount = Personnel::count();
        $filieresCount = Filiere::count();
        $elementsCount = Element::count();
        $demandesCount = Demande::count();
        $reclamationsCount = Reclamation::count();
        $enseignantsCount = Enseignant::count();
        $etablissementCount = Etablissement::count();
    
        $etudiantsCounts = Etudians::count();
        $filieres = Filiere::withCount(['students'])->get(['intitule', 'cycle', 'id_filiere']);

        $bubbleData = [];
        foreach ($filieres as $filiere) {
            $etudiantsCounts = Inscription::where('id_filiere', $filiere->id_filiere)->count();
            $bubbleData[] = [
                'x' => $filiere->intitule, // Placeholder for x value (or actual data if available)
                'y' => $etudiantsCounts,
               
            ];
        }
        $etudiantsCountss = Etudians::count();
        $etablissements = Etablissement::withCount(['students'])->get(['ville',  'code_etab']);
        $lineData = [];
        foreach ($etablissements as $etablissement) {
            $etudiantsCountss = Inscription::where('code_etab', $etablissement->code_etab)->count();
            $lineData[] = [
                'x' => $etablissement->ville, // Placeholder for x value (or actual data if available)
                'y' => $etudiantsCountss,
               
            ];
        }
        // return response()->json($bubbleData);*/
        $reclamationsParMois = Reclamation::selectRaw('MONTH(updated_at) as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->get();
    
        // Création des tableaux pour les données du graphique
        $moisLabels = [];
        $reclamationsData = [];
    
        // Remplissage des tableaux avec les données récupérées
        foreach ($reclamationsParMois as $reclamation) {
            // Récupérer le nom du mois à partir de son numéro
            $moisLabels[] = date("F", mktime(0, 0, 0, $reclamation->mois, 1));
            $reclamationsData[] = $reclamation->total;
        }

        $demandesParMois = Demande::selectRaw('MONTH(updated_at) as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->get();
    
        // Création des tableaux pour les données du graphique
        $moisLabel = [];
        $demandesData = [];
    
        // Remplissage des tableaux avec les données récupérées
        foreach ($demandesParMois as $demande) {
            // Récupérer le nom du mois à partir de son numéro
            $moisLabel[] = date("F", mktime(0, 0, 0, $demande->mois, 1));
            $demandesData[] = $demande->total;
        }
    
        // Passage des données à la vue
        return view('Admin.views.dashbord', [
            'etudiantsCount' => $etudiantsCount,
            'etudiantsCounts' => $etudiantsCounts,
            'personnelCount' => $personnelCount,
            'filieresCount' => $filieresCount,
            'elementsCount' => $elementsCount,
            'demandesCount' => $demandesCount,
            'reclamationsCount' => $reclamationsCount,
            'moisLabels' => $moisLabels,
            'moisLabel' => $moisLabel,
           'demandesData'=> $demandesData,
            'reclamationsData' => $reclamationsData,
            'enseignantsCount' =>$enseignantsCount,
            'bubbleData' => $bubbleData,
            'lineData' =>$lineData,
            'etudiantsCountss' =>$etudiantsCountss,
            'etablissementCount' =>$etablissementCount
            //'lineData'=>$lineData

        ]);
    }
    

        public function getDashboardData()
        {
            $etudiantsCount = Etudians::count();
            $personnelCount = Personnel::count();
            $filieresCount = Filiere::count();
            $elementsCount = Element::count();}
        
          
        

       
    
    
}

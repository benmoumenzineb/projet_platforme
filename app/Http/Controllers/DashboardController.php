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
    
        $filieres = Filiere::withCount(['students'])->get(['intitule', 'cycle', 'id_filiere']);
    
        $bubbleData = $filieres->map(function($filiere) {
            $etudiantsCount = Inscription::where('id_filiere', $filiere->id_filiere)->count();
            return [
                'y' => $etudiantsCount,
                'intitule' => $filiere->intitule
            ];
        });
    
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
    
        // Passage des données à la vue
        return view('Admin.views.dashbord', [
            'etudiantsCount' => $etudiantsCount,
            'personnelCount' => $personnelCount,
            'filieresCount' => $filieresCount,
            'elementsCount' => $elementsCount,
            'demandesCount' => $demandesCount,
            'reclamationsCount' => $reclamationsCount,
            'moisLabels' => $moisLabels,
            'reclamationsData' => $reclamationsData,
            'enseignantsCount' =>$enseignantsCount,
            'bubbleData' => $bubbleData
        ]);
    }
    

        public function getDashboardData()
        {
            $etudiantsCount = Etudians::count();
            $personnelCount = Personnel::count();
            $filieresCount = Filiere::count();
            $elementsCount = Element::count();}
        
          
        

       
    
    
}

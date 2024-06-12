<?php

namespace App\Http\Controllers;
use App\Models\Personnel;
use App\Models\Etudians;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class DashbordRHController extends Controller
{
    public function index()
    {
        $personnelsCount = Personnel::count();
        $etudiantsCount = Etudians::count();
        $enseignantsCount = Enseignant::count();
        $labels = ['Étudiants', 'Enseignants', 'Personnel'];
        $data = [$etudiantsCount, $enseignantsCount, $personnelsCount];
        
        
        return view('RH.views.dashbordrh', [
            'etudiantsCount' => $etudiantsCount,
           'etudiantsCount'=> $enseignantsCount,
            'personnelsCount' => $personnelsCount,
            'labels'=>$labels,
            'data'=>$data
        ]);
    }
}


    

// app/Http/Controllers/DashboardController.php


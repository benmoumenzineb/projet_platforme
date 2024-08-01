<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Module;
use App\Models\Personnel;
use App\Models\Prof;
use App\Models\HeureDebut;
use App\Models\HeureFin;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfController extends Controller
{
    public function index()
    {
        $profs = Prof::all();
        $specialites = DB::table('specialite')->select('id_specialite', 'specialite')->get();
        return view('admin.views.indexp', compact('profs', 'specialites'));
    }

    public function data(Request $request)
    {
        $query = Prof::query();

        if ($request->has('specialite') && !empty($request->specialite)) {
            $query->where('specialite', $request->specialite);
        }

        $profs = $query->get();

        return response()->json([
            'data' => $profs,
        ]);
    }
    //-----------------------------------------peut etre enlevé-------------------------------------
    public function showCalendar()
    {
        // Retrieve all professors where est_prof is 1
        $data = Personnel::where('est_prof', '=', 1)->get();
        return view('Admin.views.generate-emploi', compact('data'));
    }
    //-------------------------------------------------------------------------------------------------

// pour l'affichage des professeurs dans popup
    public function getProfessorOptions()
    {
        $data = Personnel::where('est_prof', 1)->get(['id_personnel', 'nom', 'prenom']);
        return response()->json($data);
    }

//pour l'affichage des modules dans popup
    public function getModuleOptions()
    {
        $data = Module::all(['id_module', 'intitule']);
        return response()->json($data);
    }

//pour l'affichage des elements
    public function getElementOptions()
    {
        $data = Element::all(['id_element', 'intitule']);
        return response()->json($data);
    }

    public function getHeureDebut()
    {
        $data = HeureDebut::all(['id_heure_debut', 'heure_debut']);
        return response()->json($data);
    }
    public function getHeurFin()
    {
        $data = HeureFin::all(['id_heure_fin', 'heure_fin']);
        return response()->json($data);
    }
    public function getSalle()
    {
        $data = Salle::all(['id_salle', 'num_salle']);
        return response()->json($data);
    }

}

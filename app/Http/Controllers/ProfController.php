<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prof;
use App\Models\Personnel;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
            'data' => $profs
        ]);
    }
    public function showCalendar()
    {   
        // Retrieve all professors where est_prof is 1
        $data = Personnel::where('est_prof', '=', 1)->get();
        return view('Admin.views.generate-emploi', compact('data'));
    }
// pour le code js
public function getProfessorOptions()
{
    // Retrieve all professors where est_prof is 1
    $data = Personnel::where('est_prof', 1)->get(['id_personnel', 'nom', 'prenom']);
    return response()->json($data);
}


}

<?php
// app/Http/Controllers/ProfController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prof;
use DataTables;

class ProfController extends Controller
{
    public function index()
    {
        $profs = Prof::all(); // Fetch all professors or apply any filtering logic here
        return view('admin.views.indexp', compact('profs'));
    }

    public function data(Request $request)
    {
        $query = Prof::query();

        if ($request->has('matricule_cnss') && !empty($request->matricule_cnss)) {
            $query->where('matricule_cnss', $request->matricule_cnss);
        }
        if ($request->has('specialite') && !empty($request->specialite)) {
            $query->where('specialite', $request->specialite);
        }
        if ($request->has('contrat') && !empty($request->contrat)) {
            $query->where('contrat', $request->contrat);
        }
        if ($request->has('cin') && !empty($request->cin)) {
            $query->where('cin_salarie', $request->cin);
        }

        return DataTables::of($query)->make(true);
    }


}

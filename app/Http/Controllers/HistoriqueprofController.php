<?php

namespace App\Http\Controllers;
use App\Models\seance;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class HistoriqueprofController extends Controller
{
    
    
    public function index()
    {
        $seance = seance::paginate(10); 
        return view('Prof.views.historiqueprof',compact('seance'));}
    public function fetchHistorique()
    {
        $seances = seance::select(['Num_seance', 'nom_enseignant', 'Cycle', 'Filiere', 'Matiere', 'Niveau', 'Groupe', 'horaire', 'Date','Activites']);
    
        return DataTables::of($seances)
           
            ->make(true);
    }
}
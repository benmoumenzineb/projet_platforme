<?php

namespace App\Http\Controllers;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables; 
class ReclamationscolariteController extends Controller
{
  


    public function index()
    {
        $reclamation = Reclamation::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.reclamationscolarite', compact('reclamation'));
    }
    public function reclamationEtudiants()
    {
        $reclamations = Reclamation::select(['num_rcl','Nom', 'Prenom','Numero','Email','Type','Description','file_reclamation']);
    
        return DataTables::of($reclamations)
            ->addColumn('file_reclamation', function ($reclamation) {
                // Si le fichier est une image
                if (strpos($reclamation->file_reclamation, '.jpg') !== false ||
                    strpos($reclamation->file_reclamation, '.jpeg') !== false ||
                    strpos($reclamation->file_reclamation, '.png') !== false ||
                    strpos($reclamation->file_reclamation, '.gif') !== false) {
                    // Retourner un lien vers l'image avec le nom du fichier
                    return '<a href="' . asset('asset/images/' . $reclamation->file_reclamation) . '" target="_blank">' . $reclamation->file_reclamation . '</a>';
                } else {
                    // Sinon, retourner simplement le nom du fichier avec un lien
                    return '<a href="' . asset('asset/images/' . $reclamation->file_reclamation) . '" target="_blank">' . $reclamation->file_reclamation . '</a>';
                }
            })
            ->rawColumns(['file_reclamation'])
            ->make(true);
    }
    
}


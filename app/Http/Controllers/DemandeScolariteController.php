<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Yajra\DataTables\DataTables;

class DemandeScolariteController extends Controller
{
    public function index()
    {
        $demande = Demande::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.demandescolarite', compact('demande'));
    }

    public function demandeEtudiants()
    {
        $demande = Demande::select(['id_demande', 'Nom', 'Prenom', 'Numero', 'Email', 'Type']);

        return DataTables::of($demande)
            ->addIndexColumn()
            ->addColumn('actions', function ($demande) {
                return '<div style="display: flex; gap: 5px;">

                    <form id="delete-form-' . $demande->id_demande . '" action="' . route('demandes.destroy', $demande->id_demande) . '" method="POST" style="margin: 0;">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="button" class="btn btn-danger" onclick="confirmDelete(' . $demande->id_demande . ')" style="width:auto;">Supprimer</button>
                    </form>
                </div>';
            })

            ->rawColumns(['actions'])
            ->make(true);

    }

    public function destroy($id)
    {
        // Find the personnel by cin_salarie
        $demande = Demande::findOrFail($id);

        // Delete the personnel
        $demande->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'demande supprimé avec succès.');
    }
}

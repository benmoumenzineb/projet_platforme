<?php

namespace App\Http\Controllers;

use App\Models\Demande;
<<<<<<< HEAD
use App\Models\Etudians;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables; 
=======
use Yajra\DataTables\DataTables;

>>>>>>> 4eaba6a2f78b8c36f012c2ce9bd47432d98c5849
class DemandeScolariteController extends Controller
{
    public function index()
    {
        $demande = Demande::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.demandescolarite', compact('demande'));
    }

    public function demandeEtudiants()
    {
<<<<<<< HEAD
        $demande = Demande::with('etudient')->select(['apogee', 'id', 'filiere', 'semestre', 'Numero', 'Email', 'Type']);
    
        return DataTables::of($demande)
            ->addIndexColumn()
            ->addColumn('Nom', function($demande) {
                return $demande->etudient ? $demande->etudient->Nom : '';
            })
            ->addColumn('Prenom', function($demande) {
                return $demande->etudient ? $demande->etudient->Prenom : '';
            })
            ->addColumn('actions', function($demande) {
                $disabled = $demande->archive ? 'disabled' : '';
                return '<div style="display: flex; gap: 5px;">
                           <form id="validate-form-' . $demande->apogee . '" action="' . route('demandes.valider', $demande->apogee) . '" method="POST" style="margin: 0;">
                               ' . csrf_field() . '
                               <button type="button" class="btn" onclick="confirmValidation(' . $demande->apogee . ')" style="width:auto; background-color:green; color:#fff;" ' . $disabled . '>Validé</button>
                           </form>
                           <form id="archive-form-' . $demande->apogee . '" action="' . route('demandes.archiver', $demande->apogee) . '" method="POST" style="margin: 0;">
                               ' . csrf_field() . '
                               <button type="button" class="btn" onclick="confirmArchive(' . $demande->apogee . ')" style="width:auto; background-color:gray; color:#fff;" ' . $disabled . '>Archivé</button>
                           </form>
                       </div>';
            })
            ->setRowId(function ($demande) {
                return 'row-' . $demande->apogee; // Définit l'ID de la ligne
            })
=======
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

>>>>>>> 4eaba6a2f78b8c36f012c2ce9bd47432d98c5849
            ->rawColumns(['actions'])
            ->make(true);
    }
<<<<<<< HEAD
    
   
public function destroy($id)
{
    // Find the personnel by cin_salarie
   $demande = Demande::where('id', $id)->firstOrFail();
=======
>>>>>>> 4eaba6a2f78b8c36f012c2ce9bd47432d98c5849

    public function destroy($id)
    {
        // Find the personnel by cin_salarie
        $demande = Demande::findOrFail($id);

<<<<<<< HEAD
    // Redirect back with a success message
    return redirect()->back()->with('success', 'demande supprimé avec succès.');
}
public function valider($apogee, Request $request)
    {
        $demande = Demande::where('apogee', $apogee)->firstOrFail();
        
        // Marquer la demande comme validée
        $demande->status = 'validé';
        $demande->message = true; // Indiquer que la notification a été envoyée
        $demande->save();
        return redirect()->back()->with('success', 'Demande validée et étudiant notifié.');
    }

    public function archiver($apogee, Request $request)
    {
        $demande = Demande::where('apogee', $apogee)->firstOrFail();
        
        // Mark the request as archived
        $demande->archive = true;
        $demande->save();
    
        return redirect()->back()->with('success', 'Demande archivée.');
    }
=======
        // Delete the personnel
        $demande->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'demande supprimé avec succès.');
>>>>>>> 4eaba6a2f78b8c36f012c2ce9bd47432d98c5849
    }
}

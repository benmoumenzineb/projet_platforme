<?php
namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Etudians;

class PaiementetudiantController extends Controller
{
    public function index()
    {
        $user = Auth::guard('etudient')->user();
        $inscription = DB::table('inscriptions')
        ->join('etablissement', 'inscriptions.code_etab', '=', 'etablissement.code_etab')
        ->join('filiere', 'inscriptions.id_filiere', '=', 'filiere.id_filiere')
        ->select('inscriptions.*', 'etablissement.ville as etablissement_ville', 'filiere.intitule as filiere_intitule','filiere.cycle as filiere_cycle')
        ->where('inscriptions.apogee', $user->apogee)
        ->first();
      
    $filiere = null;
    if ($inscription) {
        $etablissement = [
            'code_etab' => $inscription->code_etab,
            'ville' => $inscription->etablissement_ville,
        ];

        $filiere = [
            'id_filiere' => $inscription->id_filiere,
            'intitule' => $inscription->filiere_intitule,
            'cycle' => $inscription->filiere_cycle,
        ];
    }

   
        return view('etudiant.views.paiementetudiant', compact('user', 'inscription', 'etablissement', 'filiere'));
    }
   

    public function enregistrerPaiement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'cni' => 'required',
            'n_telephone' => 'required',
            'montant' => 'required',
            'choix' => 'required',
            'apogee' => 'required',
            'date_paiement' => 'required',
            'mode_paiement' => 'required',
            'mois_concerne' => 'required|array',
            'image' => 'nullable|image|max:2048',
            'Email' => 'required',
            'intitule' => 'required',
        ]);

        // Création d'un nouveau paiement
        foreach ($request->mois_concerne as $mois) {
            $paiement = new Paiement();
            $paiement->nom = $request->nom;
            $paiement->apogee = $request->apogee;
            $paiement->prenom = $request->prenom;
            $paiement->cni = $request->cni;
            $paiement->n_telephone = $request->n_telephone;
            $paiement->montant = $request->montant;
            $paiement->date_paiement = $request->date_paiement;
            $paiement->choix = $request->choix;
            $paiement->mode_paiement = $request->mode_paiement;
            $paiement->Email = $request->Email;
            $paiement->mois_concerne = $mois;
            $paiement->intitule =$request->intitule;

            // Gérer l'image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('asset/images'), $imageName); 
                $paiement->image = $imageName; 
            }

            $paiement->save();
        }

        return redirect()->route('paiement')->with('success', 'Votre paiement a été enregistré avec succès.');
    }

    public function getPaidMonths(Request $request)
    {
        $user = Auth::guard('etudient')->user();
        $paidMonths = Paiement::where('apogee', $user->apogee)->pluck('mois_concerne');

        return response()->json(['paidMonths' => $paidMonths]);
    }
    
    public function paiementEtudiantshistorique(Request $request)
    {
       
        $user = Auth::guard('etudient')->user();
        
       
        $paiement = Paiement::where('apogee', $user->apogee)->select([
           'date_paiement','nom', 'prenom','n_telephone','Email','cni','montant','mois_concerne','mode_paiement','choix'
        ]);
    
        return DataTables::of($paiement)->make(true);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Inscription;
use App\Models\Etudians;
use App\Models\Etablissement;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class Profil_etudiantController extends Controller
{

   

   
    public function uploadImage(Request $request)
    {
        // Validation de l'image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::guard('etudient')->user();
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName(); // Nom unique pour éviter les conflits
    
            // Vérifiez que le dossier public/asset/images existe, sinon le créer
            $destinationPath = public_path('asset/images');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
                Log::info('Dossier créé : ' . $destinationPath);
            }
    
            // Déplacez le fichier vers le dossier de destination
            $file->move($destinationPath, $fileName);
            Log::info('Image uploadée et déplacée : ' . 'asset/images/'.$fileName);
    
            // Mettre à jour le chemin de l'image dans la base de données
            Etudiant::where('id', $user->id)->update(['image' => 'asset/images/'.$fileName]);
            Log::info('Base de données mise à jour pour l\'utilisateur : ' . $user->id);
        } else {
            Log::error('Aucun fichier image trouvé dans la requête');
        }
    
        return redirect()->route('Profil_etudiant')->with('success', 'Image mise à jour avec succès.');
    }

    
    
    

    public function index()
    {
        $user = Auth::guard('etudient')->user();
        
       
        $inscription = Inscription::where('apogee', $user->apogee)->first();
       
        if ($inscription) {
           
            $etablissement = Etablissement::where('code_etab', $inscription->code_etab)->first();
        } else {
            $etablissement = null;
        }
        if ($inscription) {
            
            $filiere = Filiere::where('id_filiere', $inscription->id_filiere)->first();
        } else {
            $filiere = null;
        }
    
        return view('etudiant.views.Profil_etudiant', compact('user', 'inscription', 'etablissement','filiere'));
    }
   
    }


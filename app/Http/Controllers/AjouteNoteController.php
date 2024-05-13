<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;

class AjouteNoteController extends Controller
{
    
    
public function indexx(Request $request)
{
    try {
        // Récupérer les valeurs des critères choisis depuis la requête
        $cycle = $request->input('cycle');
        $filiere = $request->input('filiere');
        $niveau = $request->input('niveau');
        $groupe = $request->input('groupe');
        $matiere = $request->input('matiere');
        
        // Commencer avec une requête pour les étudiants
        $query = Etudians::query();
        
        
        $query->where('Cycle', $cycle)
              ->where('Groupe', $groupe)
              ->where('Matiere', $matiere);
        
        
        if ($filiere) {
            $query->where('Filiere', $filiere);
            
         
            if ($niveau) {
                $query->where('Niveau', $niveau);
            }
        }
        // Exécuter la requête et récupérer les résultats
        $etudians = $query->get();
        
        // Utiliser dd pour afficher les résultats de la requête
        //dd($etudians);
        
        // Retourner la vue avec les étudiants filtrés
        return view('Prof.views.ajoutenote', compact('etudians'));
    } catch (\Throwable $th) {
        $th->getMessage();
    }
}
public function updateNotes(Request $request)
/*{
    // Récupérer les données du formulaire
    $data = $request->all();

    // Vérifier si l'étudiant existe déjà dans la base de données
    $etudiant = Etudinas::find($data['apogee']);

    if ($etudiant) {
        // Mettre à jour les notes de l'étudiant existant
       $etudiant->CTR1 = $data['CTR1'];
       $etudiant->CTR2 = $data['CTR2'];
       $etudiant->EF = $data['EF'];
       $etudiant->TP = $data['TP'];
       $etudiant->save();

        return response()->json(['success' => true]);
    } else {
        // Créer un nouvel étudiant avec les notes fournies
       Etudians::create([
            'apogee' => $data['apogee'],
            'CNE' => $data['CNE'],
            'CTR1' => $data['CTR1'],
            'CTR2' => $data['CTR2'],
            'EF' => $data['EF'],
            'TP' => $data['TP'],
        ]);

        return response()->json(['success' => true]);
    }
}*/
{
    // Validation des données reçues depuis le formulaire
    try {
        // Votre code existant ici
    
    $request->validate([
        'apogee' => 'required|exists:Etudians,apogee',
        'CTR1' => 'nullable|numeric|min:0|max:20',
        'CTR2' => 'nullable|numeric|min:0|max:20',
        'EF' => 'nullable|numeric|min:0|max:20',
        'TP' => 'nullable|numeric|min:0|max:20',
    ]);

    // Récupérer l'ID de l'étudiant depuis la requête
    $apogee = $request->input('apogee');

    // Récupérer les données des notes modifiées depuis la requête
    $updatedNotes = $request->only(['CTR1', 'CTR2', 'EF', 'TP']);

    // Recherche de l'étudiant dans la base de données
    $etudiant = Etudiant::findOrFail($apogee);

    // Mettre à jour les notes modifiées de l'étudiant
    $etudiant->update($updatedNotes);

    // Redirection vers la page d'affichage des étudiants ou autre action souhaitée
    return redirect()->route('Prof.views.ajoutenote')->with('success', 'Les notes de l\'étudiant ont été mises à jour avec succès.');
} catch (\Throwable $th) {
        dd($th->getMessage()); // Ajoutez cette ligne pour afficher les erreurs
    }
}

public function search(Request $request)
{
    try {
        $query = $request->input('query');

        // Séparer le nom et le prénom à partir de la requête de recherche
        $keywords = explode(' ', $query);

        // Filtrer les étudiants en fonction du nom et du prénom de la recherche
        $etudians = Etudians::where(function($q) use ($keywords) {
                                foreach ($keywords as $keyword) {
                                    $q->orWhere('Nom', 'like', "%$keyword%")
                                      ->orWhere('Prenom', 'like', "%$keyword%")
                                      ->orWhere('CNE', 'like', "%$keyword%")
                                      ->orWhere('apogee', 'like', "%$keyword%");
                                }
                            })
                            ->get();

        return view('Prof.views.ajoutenote', compact('etudians'));
    } catch (\Throwable $th) {
        // Gérer les erreurs ici
    }
}

}
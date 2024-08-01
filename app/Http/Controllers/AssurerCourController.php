<?php
namespace App\Http\Controllers;

use App\Models\AssurerCour;
use App\Models\Date;
use Illuminate\Http\Request;

class AssurerCourController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'professor' => 'required|integer',
            'module' => 'required|integer',
            'element' => 'required|integer',
            'group' => 'required|string',
            'room' => 'required|integer', // Changed to integer
            'beginning' => 'required|integer', // Changed to integer
            'ending' => 'required|integer', // Changed to integer
            'date' => 'required|date',
        ]);

        // Vérifier si la date existe déjà dans la table date
        $date = Date::firstOrCreate(
            ['date' => $request->input('date')]
        );

        if ($date) {
            // Création d'une nouvelle instance et stockage des données
            $assurerCour = new AssurerCour();
            $assurerCour->id_prof = $request->input('professor');
            $assurerCour->id_module = $request->input('module');
            $assurerCour->id_element = $request->input('element');
            $assurerCour->N_groupe = $request->input('group');
            $assurerCour->id_salle = $request->input('room');
            $assurerCour->id_heure_debut = $request->input('beginning');
            $assurerCour->id_heure_fin = $request->input('ending');
            $assurerCour->id_date = $date->id_date; // Use the id of the date record

            $assurerCour->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to create or retrieve date'], 500);
        }
    }

    public function getEvents()
    {
        $events = AssurerCour::with(['element', 'module', 'professeur', 'salle', 'date', 'heureDebut', 'heureFin', 'N_groupe'])
            ->get()
            ->map(function ($event) {
                return [
                    'backgroundColor' => '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT),
                    'borderColor' => '#000',
                    'id_prof' => $event->id_prof,
                    'id_module' => $event->id_module,
                    'id_element' => $event->id_element,
                    'N_groupe' => $event->N_groupe,
                    'id_salle' => $event->id_salle,
                    'id_heure_debut' => $event->id_heure_debut,
                    'id_heure_fin' => $event->id_heure_fin,
                    'id_date' => $event->id_date,
                ];
            });

        return response()->json($events);
    }

}

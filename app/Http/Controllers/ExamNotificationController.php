<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Filiere;
use App\Models\Programme_Evaluation;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ExamNotification;

class ExamNotificationController extends Controller
{
    public function create()
    {
        $elements = Element::all();
        $filieres = Filiere::all();
        return view('exam.create', compact('elements', 'filieres'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'num_element' => 'required|exists:elements,num_element',
            'id_filiere' => 'required|exists:filieres,id_filiere',
            'date_exam' => 'required',
            'heure_exam' => 'required',
        ]);

        $programmeEvaluation = ProgrammeEvaluation::create([
            'num_element' => $validatedData['num_element'],
            'id_filiere' => $validatedData['id_filiere'],
            'date_exam' => $validatedData['date_exam'],
            'heure_exam' => $validatedData['heure_exam'],
        ]);

        // Logique pour récupérer les étudiants de la filière concernée
        $students = []; // À implémenter

        Notification::send($students, new ExamNotification($programmeEvaluation));

        return redirect()->route('exam.create')->with('success', 'Notification d\'examen envoyée avec succès!');
    }
}


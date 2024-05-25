<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Etudians;

class EtudiantLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('etudiant.views.login');
    }

    public function login(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'apogee' => 'required',
            'password' => 'required',
        ]);

        // Tentative de connexion de l'étudiant
        $credentials = $request->only('apogee', 'password');

        if (Auth::attempt($credentials)) {
            // L'étudiant est connecté avec succès
            return redirect()->route('homeetudiant'); // Rediriger vers le tableau de bord de l'étudiant
        }

        // Si la connexion échoue, redirigez l'utilisateur vers le formulaire de connexion avec un message d'erreur
        return redirect()->back()->withErrors(['error' => 'Code Apogée ou mot de passe incorrect.'])->withInput($request->only('apogee'));
    }
}

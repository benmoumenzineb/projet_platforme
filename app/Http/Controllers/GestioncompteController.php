<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\RH;
class GestioncompteController extends Controller
{
    public function index()
    {
        
        return view('Admin.views.gestioncomptes');
    }
    public function indexx()
    {
        
        return view('Admin.views.navtemplate');
    }
    public function indexxx()
    {
        
        return view('Admin.views.cc');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
           
            'email' => 'required',
            'mot_passe' => 'required',
        ]);

        $RH = new RH($validatedData);
        $RH->mot_passe = Hash::make($request->mot_passe);

       

        $RH->save();

        return redirect()->back()->with('success', 'RH ajouté avec succès!');
    }
}

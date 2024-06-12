<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('Admin.views.admin_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nom_utilisateur', 'mot_pass');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('//homeadmin');
        }
        return back()->withErrors(['nom_utilisateur' => 'Nom utilisateur ou mot de passe incorrect']);
    }

   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class homeScolariteController extends Controller
{
   
public function index()
    {
        $user = Auth::guard('scolarite')->user();
        return view('scolarite.views.homescolarite', compact('user'));
    }
}

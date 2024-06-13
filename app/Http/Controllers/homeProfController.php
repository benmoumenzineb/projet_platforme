<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class homeProfController extends Controller{


public function index()
{ $user = Auth::guard('prof')->user();
    return view('prof.views.homeprof');
}
}
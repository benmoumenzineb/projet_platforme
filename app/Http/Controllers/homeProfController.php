<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeProfController extends Controller{


public function index()
{
    return view('prof.views.homeprof');
}
}
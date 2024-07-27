<?php
// app/Http/Controllers/ScheduleController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;

class generateemploiController extends Controller
{
    public function generate()
    {
        $data = Personnel::where('est_prof', '=', 1)->get();
        return view('Admin.views.generate-emploi', compact('data'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeScolariteController extends Controller
{
    public function index()
{
    return view('scolarite.views.homescolarite');
}
}

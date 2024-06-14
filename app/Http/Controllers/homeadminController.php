<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class homeadminController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();

        return view('Admin.views.homeadmin');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
class RedirectIfAuthenticatedAdmin
{
    
    public function handle(Request $request, Closure $next)
    {
       
        if (Auth::guard('admin')->check()) {
            return redirect()->route('homeadmin');

        }

       return $next($request);
    }
       
}

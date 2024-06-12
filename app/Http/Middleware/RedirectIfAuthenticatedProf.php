<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RedirectIfAuthenticatedProf
{
   
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('prof')->check()) {
            return redirect()->route('homeaprof');

        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RedirectIfAuthenticatedAccueil
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('accueil')->check()) {
            return redirect()->route('homeaccueil');

        }
        return $next($request);
    }
}

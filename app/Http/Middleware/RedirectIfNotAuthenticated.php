<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::guard('etudient')->check()) {
            return redirect()->route('homeetudiant');
        }


        return $next($request);
    }
}

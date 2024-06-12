<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Partager les données de l'utilisateur avec toutes les vues
        View::composer('*', function ($view) {
            $view->with('authUser', Auth::guard('etudient')->user());
        });
        View::composer('*', function ($view) {
            $view->with('authUser', Auth::guard('admin')->user());
        });
        View::composer('*', function ($view) {
            $view->with('authUser', Auth::guard('scolarite')->user());
        });
    }
}

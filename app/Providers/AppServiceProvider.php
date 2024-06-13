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
        // Partager les données de l'étudiant avec toutes les vues
        View::composer('*', function ($view) {
            $view->with('authUser', Auth::guard('etudient')->user());
        });

        // Partager les données de l'administrateur avec toutes les vues
        View::composer('*', function ($view) {
            $authAdmin = Auth::guard('admin')->user();
            
            $view->with('authAdmin', $authAdmin);
        });
        

        // Partager les données du professeur avec toutes les vues
        View::composer('*', function ($view) {
            $view->with('authProf', Auth::guard('prof')->user());
        });

        View::composer('*', function ($view) {
            $view->with('authAccueil', Auth::guard('accueil')->user());
        });

        View::composer('*', function ($view) {
            $view->with('authScolarite', Auth::guard('scolarite')->user());
        });
    }

  
}

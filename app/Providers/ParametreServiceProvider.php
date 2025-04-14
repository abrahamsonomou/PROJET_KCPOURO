<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Parametre;
use App\Models\Categorie;
use App\Models\Partenaire;
use App\Models\Service;
use App\Models\Inscription;

class ParametreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Partager le premier enregistrement de Parametre avec toutes les vues
        View::composer('*', function ($view) {
            // $parametre = Parametre::first(); // Récupère le premier enregistrement
            $parametre = Parametre::firstOrCreate([]);

            // Récupérer les catégories de cours actives
            $categories_cours = Categorie::where('active', 1)
                ->where('is_cours', 1)
                ->get();
            
            $partenaires = Partenaire::where('active', 1)->orderBy('ordre', 'asc')->get();
            $services = Service::where('active', 1)->orderBy('ordre', 'asc')->get();

            $nouvelEnroulements = Inscription::where('etat', 0)->count();

            // Passer les variables à la vue correctement sous forme de tableau associatif
            $view->with([
                'parametre' => $parametre,
                'categories_cours' => $categories_cours,
                'nos_partenaires' => $partenaires,
                'nos_services' => $services,
                'nouvelEnroulements' => $nouvelEnroulements,
            ]);
        });

    }
}

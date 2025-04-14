<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Gère la vérification des rôles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles  Rôles autorisés
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect('/login'); // Redirige si non connecté
        }

        // Vérifier si le rôle de l'utilisateur est dans la liste des rôles autorisés
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'Accès refusé'); // Retourne une erreur 403 si non autorisé
        }

        return $next($request); // Passe au traitement suivant si autorisé
    }
}


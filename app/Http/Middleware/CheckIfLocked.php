<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CheckIfLocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté et si l'écran est verrouillé dans la session
        if (Auth::check() && Session::get('locked') === true) {
            // Si l'écran est verrouillé, rediriger l'utilisateur vers la page de déverrouillage
            return redirect()->route('unlock-screen');
        }

        // Si l'écran n'est pas verrouillé, continuez avec la requête
        return $next($request);
    }
}

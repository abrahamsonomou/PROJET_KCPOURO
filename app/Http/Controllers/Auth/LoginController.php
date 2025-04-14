<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private static $TEMPLATE_VESION = "v1";
    
    public function showLoginForm()
    {
        return view($this::$TEMPLATE_VESION.'.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

    // Si l'option "Remember me" est cochée, ajouter l'option `true`
    $remember = $request->has('remember');

    // Tentative de connexion
    if (Auth::attempt($credentials, $remember)) {
        // Redirection après connexion réussie
        $request->session()->regenerate();
        return redirect()->intended('/');

    }

    // Retour en cas d'échec
    return back()->withErrors([
        'email' => 'Les informations d’identification ne correspondent pas.',
    ])->onlyInput('email');
    }

}

<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscription;

class sDashboardController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function dashboard()
    {
        // Count the total number of enroulements
        $totalEnroulements = Inscription::count();

        // Count the number of activated Enroulements (etat = 1)
        $activatedEnroulements = Inscription::where('etat', 1)->count();

        // Count the number of pending Enroulements (etat = 0)
        $pendingEnroulements = Inscription::where('etat', 0)->count();
    
        // Count the number of rejected Enroulements (etat = 2)
        $rejectedEnroulements = Inscription::where('etat', 2)->count();

        return view($this::$TEMPLATE_VESION.'.students.dashboard', compact('totalEnroulements', 'activatedEnroulements', 'pendingEnroulements', 'rejectedEnroulements'));
    }
}

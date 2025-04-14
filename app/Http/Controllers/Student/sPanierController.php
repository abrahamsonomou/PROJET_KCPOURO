<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscription;

class sPanierController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function panier()
    {
        $enroulements = Inscription::where('user_id', auth()->id())->where('active', 1)->where('etat', 0)->paginate(1);
        $totalcours = $enroulements->count();

        return view($this::$TEMPLATE_VESION.'.students.panier', compact('enroulements', 'totalcours'));
    }
}

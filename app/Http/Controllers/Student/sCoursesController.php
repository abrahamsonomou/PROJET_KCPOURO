<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscription;

class sCoursesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function my_cours()
    {
        $enroulements = Inscription::where('user_id', auth()->id())->where('active', 1)->where('etat', 1)->paginate(6);
        $totalcours = $enroulements->count();

        return view($this::$TEMPLATE_VESION.'.students.my_cours', compact('enroulements', 'totalcours'));
    }
}

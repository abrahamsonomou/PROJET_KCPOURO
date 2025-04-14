<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Categorie;
use App\Models\Article;

class iDashboardController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function dashboard()
    {
        return view($this::$TEMPLATE_VESION.'.instructors.dashboard');
    }
}

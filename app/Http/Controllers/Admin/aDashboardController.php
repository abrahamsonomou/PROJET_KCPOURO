<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class aDashboardController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function dashboard()
    {
        return view($this::$TEMPLATE_VESION.'.admin.dashboard');
    }
}

<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sSettingsController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function settings()
    {
        
        return view($this::$TEMPLATE_VESION.'.students.settings');
    }
}

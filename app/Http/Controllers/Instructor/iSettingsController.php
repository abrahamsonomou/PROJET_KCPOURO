<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class iSettingsController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function settings()
    {
        return view($this::$TEMPLATE_VESION.'.instructors.settings');
    }
}

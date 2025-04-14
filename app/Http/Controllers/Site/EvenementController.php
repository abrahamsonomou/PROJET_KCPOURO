<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function events()
    {
        return view($this::$TEMPLATE_VESION.'.site.events');
    }
}

<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private static $TEMPLATE_VESION = "v1";
    
    public function about()
    {
        return view($this::$TEMPLATE_VESION.'.site.about');
    }
}

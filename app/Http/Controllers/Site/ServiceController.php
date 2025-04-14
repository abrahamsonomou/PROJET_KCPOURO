<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function services()
    {
        return view($this::$TEMPLATE_VESION.'.site.nos-services');
    }
}

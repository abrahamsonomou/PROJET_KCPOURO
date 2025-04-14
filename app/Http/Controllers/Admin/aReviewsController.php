<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class aReviewsController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function reviews()
    {
        return view($this::$TEMPLATE_VESION.'.admin.reviews');
    }
}

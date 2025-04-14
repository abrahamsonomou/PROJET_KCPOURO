<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class iReviewsController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function reviews()
    {
        return view($this::$TEMPLATE_VESION.'.instructors.reviews');
    }
}

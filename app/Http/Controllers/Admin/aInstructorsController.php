<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class aInstructorsController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function instructors()
    {
        $instructors = User::where('is_active', 1)->where('role', 'instructor')->paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.instructors', compact('instructors'));
    }

    public function instructors_request()
    {
        return view($this::$TEMPLATE_VESION.'.admin.instructors_request');
    }

    public function instructors_details()
    {
        return view($this::$TEMPLATE_VESION.'.admin.instructors_details');
    }

}

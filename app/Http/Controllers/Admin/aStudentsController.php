<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class aStudentsController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function students()
    {
        $students = User::where('is_active', 1)->where('role', 'student')->paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.students', compact('students'));
    }

}

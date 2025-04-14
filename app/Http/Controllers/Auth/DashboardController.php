<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private static $TEMPLATE_VESION = "v1";
   
    public function dashboard()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('student')) {
            return redirect()->route('students.dashboard');
        } elseif ($user->hasRole('instructor')) {
            return redirect()->route('instructors.dashboard');
        } 
        else {
            return redirect()->intended('/');
        }
    }
}

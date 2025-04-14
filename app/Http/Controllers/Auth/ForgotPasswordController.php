<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    private static $TEMPLATE_VESION = "v1";
   
    public function forgotPassword()
    {
        return view($this::$TEMPLATE_VESION.'.auth.forgot-password');
    }

    public function resetPassword()
    {
        return view($this::$TEMPLATE_VESION.'.auth.reset-password');
    }

    public function changePassword()
    {
        return view($this::$TEMPLATE_VESION.'.auth.change-password');
    }

    public function verifyEmail()
    {
        return view($this::$TEMPLATE_VESION.'.auth.verify-email');
    }

    public function resendVerificationEmail()
    {
        return view($this::$TEMPLATE_VESION.'.auth.resend-verification-email');
    }
}

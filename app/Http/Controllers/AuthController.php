<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function changePassword()
    {
        return view('change-password');
    }
}
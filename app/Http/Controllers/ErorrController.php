<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ErorrController extends Controller
{
    public function index(Request $request, Closure $next)
    {
        echo "hallo";
        // $user = $request->user();
        // if (!$user || $user->level !== 'operator') {
        //     return redirect()->route('404')->with('error', 'Akses Tidak Diperbolehkan');
        // }
    }

}
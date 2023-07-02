<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function adminlogin()
    {
        if (Auth::check()) {
            return redirect('/admin/home');
        }
        return view('admin.login');
    }

    public function loginadmin(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('name', $credentials['name'])->first();

        if ($user && Auth::attempt(['name' => $credentials['name'], 'password' => $credentials['password']])) {
            if ($user->level == 'admin') {
                return redirect('/admin/home');
            } else {
                Auth::logout();
                return redirect('/login')->withErrors(['error' => 'Akun Anda tidak memiliki akses sebagai Admin']);
            }
        } else {
            return back()->withErrors(['error' => 'User / Kata Sandi salah'])->withInput();
        }
    }


    // login operator
    public function operatorlogin()
    {
        return view('operator.login');
    }


    public function loginoperator(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('name', $credentials['name'])->first();

        if ($user && Auth::attempt(['name' => $credentials['name'], 'password' => $credentials['password']])) {
            if ($user->level == 'operator') {
                return redirect('/operator/home');
            } else {
                Auth::logout();
                return redirect('/operator/login')->withErrors(['error' => 'Akun Anda tidak memiliki akses sebagai Operator']);
            }
        } else {
            return back()->withErrors(['error' => 'User / Kata Sandi salah'])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

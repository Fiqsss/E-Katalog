<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class RegisController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);
        $existingUser = DB::table('users')
        ->Where('email', $request->email)
        ->Where('name', $request->name)
        ->first();

        if ($request->password !== $request->password_confirmation) {
                return back()->with('password', 'Password Tidak Sesuai')->withInput();

            if ($existingUser) {
                return back()->withErrors(['error' => 'Password Tidak Sesuai'])->withInput();
            }

            }else{
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'level' => $request->level,
                    'password' => Hash::make($request->password)
                ]);
            }


            return redirect()->back()->with('success', 'User Baru berhasil Ditambahkan');
        }
    }

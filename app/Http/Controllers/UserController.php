<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class UserController extends Controller
{


    public function index()
    {
        return view('error.404');
    }
    // User Admin

    public function adminuser()
    {
        $data = User::get()->all();
        $transaksi = Transaksi::all();
        $produk = Produk::with('transaksi')->paginate(6);
        return view('admin.user', ['produk' => $produk, 'transaksi' => $transaksi, 'data' => $data, "title" => "User"]);
    }


    public function insertuser(Request $request)
    {
        $data = User::create([$request->all()]);
        return redirect()->route('adminuser')->with('success', 'User Telah Ditambahkan');
    }

    public function hapususer($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('adminuser')->with('success', 'User Telah dihapus');
    }

    public function updateuser(Request $request, $id)
    {

        if ($request->edtpass !== $request->konpas) {
            return back()->with('password', 'Password Tidak Sesuai')->withInput();
        } else {
            $request->validate([
                'edtpass' => 'required|string|min:3',
            ]);
            $user = User::findOrFail($id);
            $user->name = $request->edtname;
            $user->email = $request->edtemail;
            $user->level = $request->edtlevel;
            $user->password = Hash::make($request->edtpass);
            $user->save();
        }

        return redirect()->back()->with('success', 'Data User berhasil diupdate');
    }


    // lupa password
    public function getlupapassword()
    {
        return view('mail.resetpassword');
    }

    public function lupapassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetpassword($token)
    {
        return view('mail.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('adminlogin')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}
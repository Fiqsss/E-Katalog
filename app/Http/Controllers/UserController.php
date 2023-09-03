<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

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
            $user->level = $request->edtlevel;
            $user->password = Hash::make($request->edtpass);
            $user->save();
        }

        return redirect()->back()->with('success', 'Data User berhasil diupdate');
    }


}
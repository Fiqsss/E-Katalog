<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{


    // User Admin

    public function adminuser()
    {
        $data = User::all();
        return view('admin.user',['data' => $data, "title" => "User"]);
    }


    public function insertuser(Request $request)
    {
        $data = User::create($request->all());
        return redirect()->route('adminuser')->with('success','User Telah Ditambahkan');
    }

    public function hapususer($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('adminuser')->with('success','User Telah dihapus');
    }

    public function updateuser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->user = $request->edtuser;
        $user->name = $request->edtnama;
        if ($request->edtpass === $request->konpas) {
            $request->validate([
                'edtpass' => 'required|string|min:3|confirmed',
            ]);

            $user->password = Hash::make($request->edtpass);
        }else
        {
            return back()->with('password', 'Password Tidak Sesuai')->withInput();
        }

        $user->save();
        $user->password = $request->edtpass;
        $user->save();
        return redirect()->back()->with('success', 'Data User berhasil diupdate');
    }


}

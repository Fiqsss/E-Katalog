<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ProdukController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // HOME
    public function operatorhome()
    {
        $data = Produk::all();
        return view('operator.home',['data' => $data, "title" =>"Home","color" => "#F21472"]);
    }

    public function adminhome()
    {
        $data = Produk::all();
        return view('admin.home',['data' => $data,"title" =>"Home","color" => "#F21472"]);
    }

    public function produkupdate(Request $request, $id)
{
    $produk = Produk::findOrFail($id);
    $produk->matcode = $request->edtMatcode;
    $produk->namabarang = $request->edtnama;
    $produk->kategori = $request->edtkategori;
    $produk->gambar = $request->gambarLama;

    if ($request->hasFile('gambar')) {
        // Upload file gambar baru
        $request->file('gambar')->move('produk/',$request->file('gambar')->getClientOriginalName());
        $produk->gambar = $request->file('gambar')->getClientOriginalName();
    }

    $produk->deskripsi = $request->edtdeskripsi;
    $produk->tanggal = $request->edttanggal;
    $produk->save();

    return redirect()->back()->with('success', 'Data Produk berhasil diupdate');
}

public function delete ($id){
    $data = Produk::find($id);
    $data->delete();
    return redirect()->route('adminhome')->with('success', 'Data Produk berhasil dihapus');
}




  // Tambah
  public function tambahproduk(Request $request)
  {
      return view('admin.tambahproduk',["title" => "Tambah","color" => "#fff"]);
  }

    public function insertproduk(Request $request)
    {
        $data = Produk::create($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('produk/',$request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect()->back()->with('success', 'Data Produk berhasil Ditambahkan');
    }





}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;


class ProdukController extends Controller
{
    // Transaksi Admin
    public function transaksi()
    {
        $produk = Produk::all();
        $transaksi = Transaksi::paginate(10);
        return view('admin.transaksi', ['transaksi' => $transaksi, 'produk'=> $produk, "title" => "transaksi"]);
    }

    // Transaksi Oerator
    public function transaksioperator()
    {
        $produk = Produk::all();
        $transaksi = Transaksi::paginate(10);
        return view('operator.transaksi', ['transaksi' => $transaksi, 'produk'=> $produk, "title" => "transaksi"]);
    }

    // HOME

    public function adminhome()
    {
        $produk = Produk::paginate(12);
        $transaksi = Transaksi::all();
        return view('admin.home', ['produk' => $produk,'transaksi'=> $transaksi ,"title" => "Home", "color" => "#F21472"]);
    }
    // search
    public function cari(Request $request)
    {
        $transaksi = Transaksi::all();
        $keyword = $request->input('keyword');
        $produk = Produk::where('matcode', 'LIKE', "%$keyword%")
        ->orWhere('namabarang', 'LIKE', "%$keyword%")
        ->orWhere('kategori', 'LIKE', "%$keyword%")
        ->paginate(12);
        return view('admin.home',['produk' => $produk,'transaksi'=> $transaksi ,"title" => "Home"]) ;
    }

    public function search()
    {
        $transaksi = Transaksi::all();
        $produk = Produk::paginate(12);
        return view('admin.home',['transaksi'=> $transaksi ,"title" => "Home"],compact('produk'));
    }



    // UPDATE
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
        $produk->tanggal = $request->edttanggal;
        $produk->save();
        return redirect()->back()->with('success', 'Data Produk berhasil diupdate');
    }

    // hapus
    public function delete ($id){
        $data = Produk::find($id);
        $data->delete();
        return redirect()->route('adminhome')->with('success', 'Data Produk berhasil dihapus');
    }

  // Tambah
    public function tambahproduk(Request $request)
    {
        $produk = Produk::all();
        $transaksi = Transaksi::all();
        return view('admin.tambahproduk',['transaksi' => $transaksi, 'produk' => $produk ,"title" => "Tambah","color" => "#fff"]);
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


    // Operator
    public function operatorhome()
    {
        $data = Produk::all();
        $transaksi = Transaksi::paginate(6);
        return view('operator.home',['data' => $data, 'transaksi'=>$transaksi, "title" =>"Home","color" => "#F21472"]);
    }


}

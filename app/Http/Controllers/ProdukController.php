<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProdukController extends Controller
{
    // Transaksi Admin
    public function transaksi()
    {
        $produk = Produk::get()->all();
        $transaksi = Transaksi::latest()->paginate(10);
        return view('admin.transaksi', ['transaksi' => $transaksi, 'produk' => $produk, "title" => "transaksi"]);
    }
    public function transaksioperator()
    {
        $produk = Produk::get()->all();
        $transaksi = Transaksi::latest()->paginate(10);
        return view('operator.transaksi', ['transaksi' => $transaksi, 'produk' => $produk, "title" => "transaksi"]);
    }

    // HOME


    // search
    public function cari(Request $request)
    {
        $transaksi = Transaksi::get()->all();
        $keyword = $request->input('keyword');
        $produk = Produk::where('matcode', 'LIKE', "%$keyword%")
            ->orWhere('namabarang', 'LIKE', "%$keyword%")
            ->orWhere('kategori', 'LIKE', "%$keyword%")
            ->paginate(12);
        return view('admin.home', ['produk' => $produk, 'transaksi' => $transaksi, "title" => "Home"]);
    }

    public function opratorcari(Request $request)
    {
        $transaksi = Transaksi::get()->all();
        $keyword = $request->input('keyword');
        $produk = Produk::where('matcode', 'LIKE', "%$keyword%")
            ->orWhere('namabarang', 'LIKE', "%$keyword%")
            ->orWhere('kategori', 'LIKE', "%$keyword%")
            ->paginate(12);
        return view('operator.home', ['produk' => $produk, 'transaksi' => $transaksi, "title" => "Home"]);
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
            $request->file('gambar')->move('produk/', $request->file('gambar')->getClientOriginalName());
            $produk->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $produk->tanggal = $request->edttanggal;
        $produk->save();
        return redirect()->back()->with('success', 'Data Produk berhasil diupdate');
    }

    // hapus
    public function delete($id)
    {
        $data = Produk::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data Produk berhasil dihapus');
    }

    // Tambah
    public function tambahproduk(Request $request)
    {
        $produk = Produk::get()->all();
        $transaksi = Transaksi::get()->all();
        return view('admin.tambahproduk', ['transaksi' => $transaksi, 'produk' => $produk, "title" => "Tambah", "color" => "#fff"]);
    }

    public function insertproduk(Request $request)
    {
        $request->validate([
            'namabarang' => 'required|max:255',
            'matcode' => 'required|max:255',
            'kategori' => 'required|max:255',
            'tanggal' => 'required|max:255',
            'gambar' => 'image|mimes:jpeg,jpg|max:2048',
        ]);

        if (!$request->filled('namabarang') || !$request->filled('matcode') || !$request->filled('kategori') || !$request->filled('tanggal')) {
            return redirect('/admin/tambahproduk')->withErrors(['error' => 'Lengkapi Data Terlebih Dahulu']);
        }
        $data = Produk::create($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('produk/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect('/admin/home')->with('success', 'Data Produk berhasil Ditambahkan');
    }


    // Operator
    public function operatorhome()
    {
        $produk = Produk::paginate(12);
        $transaksi = Transaksi::get()->all();
        return view('operator.home', ['produk' => $produk, 'transaksi' => $transaksi, "title" => "Home", "color" => "#F21472"]);
    }

    public function adminhome()
    {
        $produk = Produk::paginate(12);
        $transaksi = Transaksi::get()->all();
        return view('admin.home', ['produk' => $produk, 'transaksi' => $transaksi, "title" => "Home", "color" => "#F21472"]);
    }
}
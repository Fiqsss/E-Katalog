<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::latest('created_at')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function inserttransaksi(Request $request)
    {
        $request->validate([
            'prod' => 'required',
            'qty_permintaan' => 'required',
            'tanggal_transaksi' => 'required',
        ]);

        // Buat objek Produk baru
        try {
            $transaksi = new Transaksi();
            $transaksi->produk_id = $request->prod;
            $transaksi->qty_permintaan = $request->qty_permintaan;
            $transaksi->tanggal_transaksi = $request->tanggal_transaksi;

            $transaksi->save();

            return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan transaksi.');
        }
    }

    public function status(Request $request)
    {
        $transaksi = Transaksi::findOrFail($request->input('idtransaksi'));
        $transaksi->status = $request->status; // Ubah status sesuai kebutuhan Anda
        $transaksi->save();

        return redirect()->route('transaksi')->with('success', 'Transaksi Complete');
    }

    public function delete($id)
    {
        try {
            // Temukan data transaksi berdasarkan ID
            $transaksi = Transaksi::findOrFail($id);

            // Lakukan penghapusan data
            $transaksi->delete();

            // Redirect kembali ke halaman sebelumnya dengan pesan sukses
            return back()->with('success', 'Data Transaksi berhasil dihapus.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, redirect kembali dengan pesan error
            return back()->with('error', 'Terjadi kesalahan saat menghapus data Transaksi.');
        }
    }

    public function edittransaksi(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->produk_id = $request->prodedt;
        $transaksi->qty_permintaan = $request->editqty;
        $transaksi->tanggal_transaksi = $request->edittanggal;
        $transaksi->save();
        return redirect()->back()->with('success', 'Data Transaksi berhasil diupdate');
    }
}
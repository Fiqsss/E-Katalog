<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class TransaksiController extends Controller
{
    public function produk()
    {

        $produk = Produk::with('transaksi')->get();
        // return view('admin.transaksi', compact('data'));
        return view('admin.transaksi', ['produk' => $produk , "title" => "transaksi"]);
    }
}

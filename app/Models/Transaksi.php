<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    protected $guarded = [];
    public function produk()
    {
        // $data_produk = Transaksi::paginate(3);
        return $this->belongsTo(Produk::class);
    }
}

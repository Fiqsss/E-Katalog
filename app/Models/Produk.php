<?php

namespace App\Models;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Produk extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $table = "produks";
    // protected $fillable = ['id','namabarang','matcode','kategori','gambar','deskripsi','qty','tanggal'];
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}





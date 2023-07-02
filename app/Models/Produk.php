<?php

namespace App\Models;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Paginator;


class Produk extends Model
{
    use HasFactory;
    protected $guarded = [];

    // protected $table = "produks";
    // protected $fillable = ['id','namabarang','matcode','kategori','gambar','deskripsi','qty','tanggal'];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}

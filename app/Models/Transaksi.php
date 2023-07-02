<?php

namespace App\Models;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}

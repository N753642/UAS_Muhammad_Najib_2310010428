<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;

    protected $table = 'detail_pembelian';

    protected $fillable = [
        'pembelian_id',
        'produk_id',
        'jumlah',
        'harga_beli',
        'subtotal',
    ];

    // ✅ RELASI KE PEMBELIAN
    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'pembelian_id');
    }

    // ✅ RELASI KE PRODUK
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}

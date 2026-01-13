<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = [
        'user_id',
        'tanggal',
        'supplier',
        'total_harga',
        'keterangan',
    ];

    // ✅ RELASI KE DETAIL PEMBELIAN
    public function detailPembelian()
    {
        return $this->hasMany(DetailPembelian::class, 'pembelian_id');
    }

    // ✅ RELASI KE USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

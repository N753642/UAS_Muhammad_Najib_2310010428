<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class KasirController extends Controller
{
    public function dashboard()
{
    $transaksiHariIni = Transaksi::whereDate('tanggal', now())->count();
    $totalHariIni = Transaksi::whereDate('tanggal', now())->sum('total_harga');

    return view('kasir.dashboard', compact(
        'transaksiHariIni',
        'totalHariIni'
    ));
}

}

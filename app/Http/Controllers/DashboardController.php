<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Pembelian;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProduk'      => Produk::count(),
            'totalTransaksi'   => Transaksi::count(),
            'totalPembelian'   => Pembelian::sum('total_harga'),
            'totalPenjualan'   => Transaksi::sum('total'),
            'transaksiTerbaru' => Transaksi::with('user')
                                    ->latest()
                                    ->take(5)
                                    ->get(),
            'pembelianTerbaru' => Pembelian::with('user')
                                    ->latest()
                                    ->take(5)
                                    ->get(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;

class LaporanPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with('user');

        // jika kasir, hanya lihat transaksinya sendiri
        if (Auth::user()->role === 'kasir') {
            $query->where('user_id', Auth::id());
        }

        // filter tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // filter bulan
        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal', substr($request->bulan, 5, 2))
                  ->whereYear('tanggal', substr($request->bulan, 0, 4));
        }

        $transaksi = $query->orderBy('tanggal', 'desc')->get();

        $totalPenjualan = $transaksi->sum('total');

        return view('laporan.penjualan.index', compact(
            'transaksi',
            'totalPenjualan'
        ));
    }
}

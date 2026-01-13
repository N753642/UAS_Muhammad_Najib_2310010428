<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Produk;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('user')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('kasir.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $produk = Produk::where('stok', '>', 0)->get();
        return view('kasir.transaksi.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|array',
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|numeric|min:1',
        ]);

        DB::transaction(function () use ($request) {

            $transaksi = Transaksi::create([
                'user_id' => Auth::id(),
                'tanggal' => now(),
                'total' => 0,
            ]);

            $total = 0;

            foreach ($request->produk_id as $index => $produk_id) {

                $produk = Produk::findOrFail($produk_id);
                $jumlah = $request->jumlah[$index];

                if ($produk->stok < $jumlah) {
                    abort(400, 'Stok tidak mencukupi');
                }

                $subtotal = $produk->harga_jual * $jumlah;

                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $produk->id,
                    'jumlah' => $jumlah,
                    'harga' => $produk->harga_jual,
                    'subtotal' => $subtotal,
                ]);

                $produk->decrement('stok', $jumlah);
                $total += $subtotal;
            }

            $transaksi->update(['total' => $total]);
        });

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with(['user', 'detailTransaksi.produk'])
            ->findOrFail($id);

        return view('kasir.transaksi.show', compact('transaksi'));
    }
}

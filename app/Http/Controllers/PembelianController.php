<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Pembelian;
use App\Models\DetailPembelian;
use App\Models\Produk;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::orderBy('tanggal', 'desc')->get();
        return view('admin.pembelian.index', compact('pembelian'));
    }

    public function create()
    {
        $produk = Produk::all();
        return view('admin.pembelian.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|array',
            'jumlah' => 'required|array',
            'harga_beli' => 'required|array',
            'jumlah.*' => 'required|numeric|min:1',
            'harga_beli.*' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {

            $pembelian = Pembelian::create([
                'user_id'     => Auth::id(),
                'tanggal'     => now(),
                'supplier'    => $request->supplier,
                'keterangan'  => $request->keterangan,
                'total_harga' => 0,
            ]);

            $total = 0;

            foreach ($request->produk_id as $i => $produk_id) {

                $produk = Produk::findOrFail($produk_id);
                $jumlah = $request->jumlah[$i];
                $hargaBeli = $request->harga_beli[$i];

                $subtotal = $jumlah * $hargaBeli;

                DetailPembelian::create([
                    'pembelian_id' => $pembelian->id,
                    'produk_id' => $produk->id,
                    'jumlah' => $jumlah,
                    'harga_beli' => $hargaBeli,
                    'subtotal' => $subtotal,
                ]);

                
                $produk->increment('stok', $jumlah);

                $total += $subtotal;
            }

            $pembelian->update([
    'total_harga' => $total
]);

        });

        return redirect()
            ->route('pembelian.index')
            ->with('success', 'Pembelian berhasil disimpan');
    }

    public function show($id)
    {
        $pembelian = Pembelian::with('detailPembelian.produk')->findOrFail($id);
        return view('admin.pembelian.show', compact('pembelian'));
    }

    public function laporan(Request $request)
{
    $query = Pembelian::with('user');

    if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
        $query->whereBetween('tanggal', [
            $request->tanggal_awal,
            $request->tanggal_akhir
        ]);
    }

    $pembelian = $query->orderBy('tanggal', 'desc')->get();

    $total = $pembelian->sum('total_harga');

    return view('admin.laporan.pembelian', compact('pembelian', 'total'));
}
}

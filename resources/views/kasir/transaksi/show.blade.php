@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 space-y-6">

    <!-- Header -->
    <div>
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Detail Transaksi</h2>
        <p class="text-gray-600">Tanggal: <span class="font-medium">{{ $transaksi->tanggal }}</span></p>
        <p class="text-gray-600">Kasir: <span class="font-medium">{{ $transaksi->user->name }}</span></p>
    </div>

    <!-- Table Card -->
    <div class="bg-white shadow-md rounded-2xl overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm">
                <tr>
                    <th class="px-4 py-3 text-left w-12">No</th>
                    <th class="px-4 py-3 text-left">Produk</th>
                    <th class="px-4 py-3 text-left">Ukuran</th>
                    <th class="px-4 py-3 text-right">Jumlah</th>
                    <th class="px-4 py-3 text-right">Harga</th>
                    <th class="px-4 py-3 text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach ($transaksi->detailTransaksi as $d)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $d->produk->nama_produk }}</td>
                    <td class="px-4 py-3">{{ $d->produk->ukuran }}</td>
                    <td class="px-4 py-3 text-right">{{ $d->jumlah }}</td>
                    <td class="px-4 py-3 text-right">Rp {{ number_format($d->harga, 0, ',', '.') }}</td>
                    <td class="px-4 py-3 text-right font-medium">Rp {{ number_format($d->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Total -->
    <div class="text-right text-gray-800 font-semibold text-lg">
        Total: Rp {{ number_format($transaksi->total, 0, ',', '.') }}
    </div>

</div>
@endsection

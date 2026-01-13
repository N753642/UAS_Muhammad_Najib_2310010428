@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">
                Detail Pembelian
            </h1>
            <p class="text-sm text-gray-500">
                Informasi lengkap pembelian dan produk
            </p>
        </div>

        <a href="{{ route('pembelian.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition">
            ← Kembali
        </a>
    </div>

    {{-- Informasi Pembelian --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xs font-semibold text-gray-500 uppercase mb-4">
            Informasi Pembelian
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
            <div>
                <p class="text-gray-500">Tanggal</p>
                <p class="font-medium text-gray-800">
                    {{ $pembelian->tanggal }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Supplier</p>
                <p class="font-medium text-gray-800">
                    {{ $pembelian->supplier }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">User</p>
                <p class="font-medium text-gray-800">
                    {{ $pembelian->user->name }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Keterangan</p>
                <p class="font-medium text-gray-800">
                    {{ $pembelian->keterangan ?? '-' }}
                </p>
            </div>
        </div>
    </div>

    {{-- Detail Produk --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <div class="px-6 py-4 border-b">
            <h2 class="text-xs font-semibold text-gray-500 uppercase">
                Detail Produk
            </h2>
        </div>

        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left">Produk</th>
                    <th class="px-4 py-3 text-center">Jumlah</th>
                    <th class="px-4 py-3 text-right">Harga Beli</th>
                    <th class="px-4 py-3 text-right">Subtotal</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach($pembelian->detailPembelian as $d)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">
                        {{ $d->produk->nama_produk }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        {{ $d->jumlah }}
                    </td>
                    <td class="px-4 py-3 text-right">
                        Rp {{ number_format($d->harga_beli) }}
                    </td>
                    <td class="px-4 py-3 text-right font-medium text-gray-800">
                        Rp {{ number_format($d->subtotal) }}
                    </td>
                </tr>
                @endforeach
            </tbody>

            <tfoot class="bg-gray-50">
                <tr>
                    <th colspan="3" class="px-4 py-3 text-right text-gray-700">
                        Total Pembelian
                    </th>
                    <th class="px-4 py-3 text-right text-gray-900 font-semibold">
                        Rp {{ number_format($pembelian->total_harga) }}
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection

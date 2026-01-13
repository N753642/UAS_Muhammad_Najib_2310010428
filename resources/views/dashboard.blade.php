@extends('layouts.app')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div>
        <h1 class="text-xl font-semibold text-gray-800">
            Dashboard
        </h1>
        <p class="text-sm text-gray-500">
            Ringkasan aktivitas aplikasi penjualan baju
        </p>
    </div>


    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Total Produk</p>
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $totalProduk }}
            </h2>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Total Transaksi</p>
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $totalTransaksi }}
            </h2>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Total Pembelian</p>
            <h2 class="text-2xl font-bold text-gray-800">
                Rp {{ number_format($totalPembelian) }}
            </h2>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Total Penjualan</p>
            <h2 class="text-2xl font-bold text-indigo-600">
                Rp {{ number_format($totalPenjualan) }}
            </h2>
        </div>

    </div>

    <!-- Transaksi Terbaru -->
    <div class="bg-white rounded-xl shadow">
        <div class="p-5 border-b">
            <h3 class="font-semibold text-gray-800">
                Transaksi Terbaru
            </h3>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3 text-left">Kasir</th>
                        <th class="px-4 py-3 text-right">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($transaksiTerbaru as $t)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $t->tanggal }}</td>
                        <td class="px-4 py-3">{{ $t->user->name }}</td>
                        <td class="px-4 py-3 text-right font-medium">
                            Rp {{ number_format($t->total) }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                            Belum ada transaksi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- Pembelian Terbaru -->
<div class="bg-white rounded-xl shadow">
    <div class="p-5 border-b flex items-center justify-between">
        <h3 class="font-semibold text-gray-800">
            Pembelian Terbaru
        </h3>

    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-left">Supplier</th>
                    <th class="px-4 py-3 text-left">User</th>
                    <th class="px-4 py-3 text-right">Total</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($pembelianTerbaru as $p)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $p->tanggal }}</td>
                    <td class="px-4 py-3">{{ $p->supplier }}</td>
                    <td class="px-4 py-3">{{ $p->user->name }}</td>
                    <td class="px-4 py-3 text-right font-medium">
                        Rp {{ number_format($p->total_harga) }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                        Belum ada pembelian
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</div>
@endsection

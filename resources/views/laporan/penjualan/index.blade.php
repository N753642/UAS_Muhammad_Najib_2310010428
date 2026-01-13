@extends('layouts.app')

@section('content')
<div class="space-y-6 p-4 md:p-6">

    <!-- Header -->
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">
            Laporan Penjualan
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Rekap data penjualan berdasarkan tanggal atau bulan
        </p>
    </div>

    <!-- Filter -->
    <div class="bg-white rounded-2xl shadow-md p-6">
        <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Tanggal
                </label>
                <input type="date"
                       name="tanggal"
                       value="{{ request('tanggal') }}"
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Bulan
                </label>
                <input type="month"
                       name="bulan"
                       value="{{ request('bulan') }}"
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex gap-2 md:col-span-2">
                <button type="submit"
                        class="px-4 py-2 bg-indigo-500 text-white text-sm font-medium rounded-lg hover:bg-indigo-600 transition">
                    Filter
                </button>

                <a href="{{ route('laporan.penjualan') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition">
                    Reset
                </a>
            </div>

        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-md overflow-x-auto">
        <table class="min-w-full text-sm divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-left">Kasir</th>
                    <th class="px-4 py-3 text-right">Total</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-100">
                @forelse ($transaksi as $t)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $t->tanggal }}</td>
                    <td class="px-4 py-3">{{ $t->user->name }}</td>
                    <td class="px-4 py-3 text-right font-medium">
                        Rp {{ number_format($t->total) }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('transaksi.show', $t->id) }}"
                           class="px-3 py-1 bg-blue-500 text-white text-xs font-medium rounded-lg hover:bg-blue-600 transition">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                        Data tidak ditemukan
                    </td>
                </tr>
                @endforelse
            </tbody>

            <tfoot class="bg-gray-50">
                <tr>
                    <th colspan="3" class="px-4 py-3 text-right text-gray-700">
                        Total Penjualan
                    </th>
                    <th colspan="2" class="px-4 py-3 text-right text-gray-900 font-semibold">
                        Rp {{ number_format($totalPenjualan) }}
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection

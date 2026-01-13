@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">
                Laporan Pembelian
            </h1>
            <p class="text-sm text-gray-500">
                Rekap data pembelian berdasarkan rentang tanggal
            </p>
        </div>

        <div class="bg-indigo-50 text-indigo-700 px-4 py-2 rounded-lg text-sm font-medium">
            Total: Rp {{ number_format($total) }}
        </div>
    </div>

    <!-- Filter -->
    <div class="bg-white rounded-xl shadow-sm border p-6">
        <form method="GET"
              class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Tanggal Awal
                </label>
                <input type="date"
                       name="tanggal_awal"
                       value="{{ request('tanggal_awal') }}"
                       class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Tanggal Akhir
                </label>
                <input type="date"
                       name="tanggal_akhir"
                       value="{{ request('tanggal_akhir') }}"
                       class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex gap-2 md:col-span-2">
                <button type="submit"
                        class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition">
                    Filter
                </button>

                <a href="{{ route('laporan.pembelian') }}"
                   class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-left">Supplier</th>
                    <th class="px-4 py-3 text-left">User</th>
                    <th class="px-4 py-3 text-right">Total</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse ($pembelian as $p)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $p->tanggal }}</td>
                    <td class="px-4 py-3">{{ $p->supplier }}</td>
                    <td class="px-4 py-3">{{ $p->user->name }}</td>
                    <td class="px-4 py-3 text-right font-semibold text-gray-800">
                        Rp {{ number_format($p->total_harga) }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('pembelian.show', $p->id) }}"
                           class="inline-flex items-center gap-1 px-3 py-1 bg-blue-500 text-white text-xs rounded-lg hover:bg-blue-600 transition">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6"
                        class="px-4 py-8 text-center text-gray-500">
                        Data tidak ditemukan
                    </td>
                </tr>
                @endforelse
            </tbody>

            <tfoot class="bg-gray-50">
                <tr>
                    <th colspan="4"
                        class="px-4 py-3 text-right text-gray-700">
                        Total Pembelian
                    </th>
                    <th colspan="2"
                        class="px-4 py-3 text-right text-gray-900 font-semibold">
                        Rp {{ number_format($total) }}
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection

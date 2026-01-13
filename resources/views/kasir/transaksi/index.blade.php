@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h4 class="text-xl font-semibold text-gray-800 mb-3 md:mb-0">
            Data Transaksi
        </h4>
        <a href="{{ route('transaksi.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Transaksi Baru
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white shadow-md rounded-2xl overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-600 text-sm uppercase">
                <tr>
                    <th class="px-4 py-3 text-left w-12">No</th>
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
                        Rp {{ number_format($t->total, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('transaksi.show', $t->id) }}"
                           class="px-3 py-1 bg-indigo-500 text-white text-xs font-medium rounded-lg hover:bg-indigo-600 transition">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-400">
                        Data transaksi belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Optional: Total Penjualan -->
    @if($transaksi->count())
    <div class="mt-4 text-right text-gray-800 font-semibold">
        Total Penjualan: Rp {{ number_format($transaksi->sum('total'), 0, ',', '.') }}
    </div>
    @endif

</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">
                Data Pembelian
            </h1>
            <p class="text-sm text-gray-500">
                Daftar seluruh transaksi pembelian barang
            </p>
        </div>

        <a href="{{ route('pembelian.create') }}"
           class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg
                  hover:bg-indigo-700 transition shadow">
            + Tambah Pembelian
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-left">Supplier</th>
                    <th class="px-4 py-3 text-right">Total Harga</th>
                    <th class="px-4 py-3 text-left">User</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($pembelian as $p)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $p->tanggal }}</td>
                    <td class="px-4 py-3">{{ $p->supplier }}</td>
                    <td class="px-4 py-3 text-right font-semibold text-gray-800">
                        Rp {{ number_format($p->total_harga) }}
                    </td>
                    <td class="px-4 py-3">{{ $p->user->name }}</td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('pembelian.show', $p->id) }}"
                           class="inline-flex items-center px-3 py-1.5
                                  text-xs font-medium text-white bg-blue-600
                                  rounded-md hover:bg-blue-700 transition">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6"
                        class="px-4 py-6 text-center text-gray-500">
                        Data pembelian belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection

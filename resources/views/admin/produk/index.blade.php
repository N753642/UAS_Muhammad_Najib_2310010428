@extends('layouts.app')

@section('title', 'Produk')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">
                Data Produk
            </h1>
            <p class="text-sm text-gray-500">
                Kelola data produk yang dijual
            </p>
        </div>

        <a href="{{ route('produk.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg
                  hover:bg-blue-700 transition">
            + Tambah Produk
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama Produk</th>
                    <th class="px-4 py-3 text-left">Kategori</th>
                    <th class="px-4 py-3 text-left">Ukuran</th>
                    <th class="px-4 py-3 text-center">Stok</th>
                    <th class="px-4 py-3 text-right">Harga Jual</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach($produk as $p)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 font-medium text-gray-800">
                        {{ $p->nama_produk }}
                    </td>
                    <td class="px-4 py-3">
                        {{ $p->kategori->nama_kategori ?? '-' }}
                    </td>
                    <td class="px-4 py-3">{{ $p->ukuran }}</td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 text-xs rounded-full
                            {{ $p->stok > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $p->stok }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        Rp {{ number_format($p->harga_jual, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="{{ route('produk.edit', $p->id) }}"
                           class="inline-block px-3 py-1 text-xs font-medium text-blue-600
                                  bg-blue-100 rounded hover:bg-blue-200">
                            Edit
                        </a>

                        <form action="{{ route('produk.destroy', $p->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button
                                onclick="return confirm('Hapus produk?')"
                               class="inline-block px-3 py-1 text-xs font-medium text-red-600
                                           bg-red-100 rounded hover:bg-red-200">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection

@extends('layouts.app')

@section('title', 'Kategori')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-800">
            Data Kategori
        </h1>

        <a href="{{ route('kategori.create') }}"
           class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg
                  hover:bg-indigo-700 transition">
            + Tambah Kategori
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="rounded-lg bg-green-100 border border-green-200 text-green-700 px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3 w-12">No</th>
                    <th class="px-6 py-3">Nama Kategori</th>
                    <th class="px-6 py-3">Keterangan</th>
                    <th class="px-6 py-3 w-32 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($kategori as $k)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 font-medium text-gray-800">
                        {{ $k->nama_kategori }}
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        {{ $k->keterangan ?? '-' }}
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="{{ route('kategori.edit', $k->id) }}"
                           class="inline-block px-3 py-1 text-xs font-medium text-blue-600
                                  bg-blue-100 rounded hover:bg-blue-200">
                            Edit
                        </a>

                        <form action="{{ route('kategori.destroy', $k->id) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus kategori ini?')"
                                    class="inline-block px-3 py-1 text-xs font-medium text-red-600
                                           bg-red-100 rounded hover:bg-red-200">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                        Data kategori belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection

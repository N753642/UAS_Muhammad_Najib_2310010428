@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<div class="max-w-xl space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">
            Tambah Kategori
        </h1>
        <p class="text-sm text-gray-500">
            Tambahkan kategori baru untuk produk
        </p>
    </div>

    {{-- Form --}}
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Nama Kategori --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Kategori
                </label>
                <input
                    type="text"
                    name="nama_kategori"
                    placeholder="Contoh: Kaos"
                    required
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500
                           focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                >
            </div>

            {{-- Keterangan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Keterangan
                </label>
                <textarea
                    name="keterangan"
                    rows="3"
                    placeholder="Opsional"
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500
                           focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                ></textarea>
            </div>

            {{-- Action --}}
            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('kategori.index') }}"
                   class="text-sm text-gray-600 hover:text-gray-800">
                    ← Kembali
                </a>

                <button
                    type="submit"
                    class="px-5 py-2 bg-green-600 text-white rounded-lg
                           hover:bg-green-700 transition"
                >
                    Simpan
                </button>
            </div>
        </form>
    </div>

</div>

@endsection

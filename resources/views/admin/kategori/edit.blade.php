@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')

<div class="max-w-xl space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">
            Edit Kategori
        </h1>
        <p class="text-sm text-gray-500">
            Perbarui data kategori
        </p>
    </div>

    {{-- Form --}}
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Nama Kategori --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Kategori
                </label>
                <input
                    type="text"
                    name="nama_kategori"
                    value="{{ $kategori->nama_kategori }}"
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
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500
                           focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                >{{ $kategori->keterangan }}</textarea>
            </div>

            {{-- Action --}}
            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('kategori.index') }}"
                   class="text-sm text-gray-600 hover:text-gray-800">
                    ← Kembali
                </a>

                <button
                    type="submit"
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg
                           hover:bg-blue-700 transition"
                >
                    Update
                </button>
            </div>

        </form>
    </div>

</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="max-w-3xl space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">
            Edit Produk
        </h1>
        <p class="text-sm text-gray-500">
            Perbarui informasi produk
        </p>
    </div>

    {{-- Form --}}
    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('produk.update', $produk->id) }}"
              method="POST"
              class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Kategori --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kategori
                </label>
                <select name="kategori_id"
                        class="w-full rounded-lg border-gray-300
                               focus:ring-blue-500 focus:border-blue-500">
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}"
                            {{ $produk->kategori_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nama Produk --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Produk
                </label>
                <input type="text"
                       name="nama_produk"
                       value="{{ $produk->nama_produk }}"
                       class="w-full rounded-lg border-gray-300
                              focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Ukuran --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Ukuran
                </label>
                <input type="text"
                       name="ukuran"
                       value="{{ $produk->ukuran }}"
                       class="w-full rounded-lg border-gray-300
                              focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Grid Angka --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                {{-- Stok --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Stok
                    </label>
                    <input type="number"
                           name="stok"
                           value="{{ $produk->stok }}"
                           class="w-full rounded-lg border-gray-300
                                  focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Harga Beli --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Harga Beli
                    </label>
                    <input type="number"
                           name="harga_beli"
                           value="{{ $produk->harga_beli }}"
                           class="w-full rounded-lg border-gray-300
                                  focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Harga Jual --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Harga Jual
                    </label>
                    <input type="number"
                           name="harga_jual"
                           value="{{ $produk->harga_jual }}"
                           class="w-full rounded-lg border-gray-300
                                  focus:ring-blue-500 focus:border-blue-500">
                </div>

            </div>

            {{-- Button --}}
            <div class="flex justify-end gap-2 pt-4">
                <a href="{{ route('produk.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg
                          hover:bg-gray-300 transition">
                    Batal
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg
                               hover:bg-blue-700 transition">
                    Update
                </button>
            </div>

        </form>
    </div>

</div>

@endsection

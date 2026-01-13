@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">
            Tambah Pembelian
        </h1>
        <p class="text-sm text-gray-500">
            Input data pembelian dan produk yang dibeli
        </p>
    </div>

    <form action="{{ route('pembelian.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Informasi Pembelian --}}
        <div class="bg-white rounded-xl shadow p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Supplier
                </label>
                <input type="text" name="supplier" required
                       class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Keterangan
                </label>
                <textarea name="keterangan" rows="3"
                          class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>
        </div>

        {{-- Produk Pembelian --}}
        <div class="bg-white rounded-xl shadow p-6 space-y-4">

            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-700">
                    Detail Produk
                </h2>

                <button type="button" id="tambah-produk"
                        class="px-3 py-2 bg-gray-200 text-gray-700 text-sm rounded-lg hover:bg-gray-300 transition">
                    + Tambah Produk
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 text-left">Produk</th>
                            <th class="px-4 py-3 text-left">Jumlah</th>
                            <th class="px-4 py-3 text-left">Harga Beli</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="produk-area" class="divide-y">
                        <tr>
                            <td class="px-4 py-3">
                                <select name="produk_id[]" required
                                        class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">-- Pilih Produk --</option>
                                    @foreach($produk as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_produk }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="px-4 py-3">
                                <input type="number" name="jumlah[]" min="1" required
                                       class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                            </td>

                            <td class="px-4 py-3">
                                <input type="number" name="harga_beli[]" min="0" required
                                       class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                            </td>

                            <td class="px-4 py-3 text-center">
                                <button type="button"
                                        class="btn-remove px-3 py-1.5 text-xs font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-2">
            <a href="{{ route('pembelian.index') }}"
               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                Batal
            </a>

            <button type="submit"
                    class="px-5 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition shadow">
                Simpan Pembelian
            </button>
        </div>

    </form>
</div>

{{-- JS --}}
<script>
document.getElementById('tambah-produk').addEventListener('click', function () {
    let row = document.querySelector('#produk-area tr').cloneNode(true);
    row.querySelectorAll('input').forEach(input => input.value = '');
    row.querySelector('select').selectedIndex = 0;
    document.getElementById('produk-area').appendChild(row);
});

document.addEventListener('click', function(e){
    if(e.target.classList.contains('btn-remove')){
        let rows = document.querySelectorAll('#produk-area tr');
        if(rows.length > 1){
            e.target.closest('tr').remove();
        }
    }
});
</script>

@endsection

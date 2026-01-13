@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">

    <h4 class="text-xl font-semibold mb-4 text-gray-800">Tambah Transaksi</h4>

    <div class="bg-white shadow-md rounded-2xl p-6">
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="produkTable">
                    <thead class="bg-gray-100 text-gray-600 text-sm uppercase">
                        <tr>
                            <th class="px-4 py-2 text-left">Produk</th>
                            <th class="px-4 py-2 w-36 text-left">Jumlah</th>
                            <th class="px-4 py-2 w-28 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <tr>
                            <td class="px-4 py-2">
                                <select name="produk_id[]" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @foreach ($produk as $p)
                                        <option value="{{ $p->id }}">
                                            {{ $p->nama_produk }} - {{ $p->ukuran }} (stok {{ $p->stok }})
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="jumlah[]" min="1" required
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </td>
                            <td class="px-4 py-2 text-center">
                                <button type="button" onclick="hapusBaris(this)"
                                        class="bg-red-500 text-white text-sm px-3 py-1 rounded-lg hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 mb-6">
                <button type="button" onclick="tambahBaris()"
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                    + Tambah Produk
                </button>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('transaksi.index') }}"
                   class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Simpan Transaksi
                </button>
            </div>

        </form>
    </div>

</div>

<script>
function tambahBaris() {
    let table = document.getElementById('produkTable').getElementsByTagName('tbody')[0];
    let row = table.insertRow(-1);

    row.innerHTML = `
        <td class="px-4 py-2">
            <select name="produk_id[]" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                @foreach ($produk as $p)
                    <option value="{{ $p->id }}">
                        {{ $p->nama_produk }} - {{ $p->ukuran }} (stok {{ $p->stok }})
                    </option>
                @endforeach
            </select>
        </td>
        <td class="px-4 py-2">
            <input type="number" name="jumlah[]" min="1" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
        </td>
        <td class="px-4 py-2 text-center">
            <button type="button" onclick="hapusBaris(this)"
                    class="bg-red-500 text-white text-sm px-3 py-1 rounded-lg hover:bg-red-600 transition">
                Hapus
            </button>
        </td>
    `;
}

function hapusBaris(btn) {
    btn.closest('tr').remove();
}
</script>
@endsection

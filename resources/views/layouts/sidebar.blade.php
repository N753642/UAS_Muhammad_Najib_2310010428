<aside class="w-64 bg-white shadow-md flex flex-col">

    {{-- Logo --}}
    <div class="h-16 flex items-center px-6 border-b">
        <span class="text-lg font-semibold text-indigo-600">
            Penjualan Baju
        </span>
    </div>

    {{-- Menu --}}
    <nav class="flex-1 px-4 py-4 text-sm space-y-1">

        {{-- ================= ADMIN ================= --}}
        @if(auth()->user()->role === 'admin')

            <p class="px-3 pt-2 text-xs text-gray-400 uppercase">
                Admin Menu
            </p>

            <a href="{{ route('dashboard') }}"
               class="flex items-center px-4 py-2 rounded-lg
               {{ request()->routeIs('dashboard') ? 'bg-indigo-100 text-indigo-600 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                📊 Dashboard
            </a>

            <a href="{{ route('kategori.index') }}"
               class="flex items-center px-4 py-2 rounded-lg
               {{ request()->routeIs('kategori.*') ? 'bg-indigo-100 text-indigo-600 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                📁 Kategori
            </a>

            <a href="{{ route('produk.index') }}"
               class="flex items-center px-4 py-2 rounded-lg
               {{ request()->routeIs('produk.*') ? 'bg-indigo-100 text-indigo-600 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                👕 Produk
            </a>

            <a href="{{ route('pembelian.index') }}"
               class="flex items-center px-4 py-2 rounded-lg
               {{ request()->routeIs('pembelian.*') ? 'bg-indigo-100 text-indigo-600 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                📦 Pembelian
            </a>

            <p class="px-3 pt-4 text-xs text-gray-400 uppercase">
                Laporan
            </p>

            <a href="{{ route('laporan.pembelian') }}"
               class="flex items-center px-4 py-2 rounded-lg
               {{ request()->routeIs('laporan.pembelian') ? 'bg-indigo-100 text-indigo-600 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                📈 Laporan Pembelian
            </a>

   
        @endif


        {{-- ================= KASIR ================= --}}
        @if(auth()->user()->role === 'kasir')

            <p class="px-3 pt-2 text-xs text-gray-400 uppercase">
                Kasir Menu
            </p>

            <a href="{{ route('dashboard') }}"
               class="flex items-center px-4 py-2 rounded-lg
               {{ request()->routeIs('dashboard') ? 'bg-indigo-100 text-indigo-600 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                📊 Dashboard
            </a>

            <a href="{{ route('transaksi.index') }}"
               class="flex items-center px-4 py-2 rounded-lg
               {{ request()->routeIs('transaksi.*') ? 'bg-indigo-100 text-indigo-600 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                💰 Transaksi
            </a>

            <a href="{{ route('laporan.penjualan') }}"
               class="flex items-center px-4 py-2 rounded-lg
               {{ request()->routeIs('laporan.penjualan') ? 'bg-indigo-100 text-indigo-600 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                📊 Laporan Penjualan
            </a>

        @endif

    </nav>

</aside>

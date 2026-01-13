<header class="h-16 bg-white border-b shadow-sm flex items-center justify-between px-6">

    {{-- Left --}}
    <div class="flex items-center gap-3">
        <span class="text-gray-600 text-sm">
            {{ auth()->user()->name }}
        </span>
    </div>

    {{-- Right --}}
    <div class="flex items-center gap-4">

        {{-- Role --}}
        <span class="text-xs px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full">
            {{ auth()->user()->role }}
        </span>

        {{-- Logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="text-sm text-gray-500 hover:text-red-600 transition">
                Logout
            </button>
        </form>

    </div>

</header>

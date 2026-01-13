<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Penjualan Baju')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Content --}}
    <div class="flex-1 flex flex-col">

        {{-- Navbar --}}
        @include('layouts.navbar')

        {{-- Main Content --}}
        <main class="p-6">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>

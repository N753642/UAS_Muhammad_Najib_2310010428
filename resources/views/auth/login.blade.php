<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">

        <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl p-10">

            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="h-14 w-14 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 font-bold text-xl">
                        TB
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Toko Baju Online
                </h1>
                <p class="text-gray-500 mt-1">
                    Masuk untuk mengelola penjualan dan stok
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" value="Email" class="mb-1"/>
                    <x-text-input
                        id="email"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        class="block w-full bg-white rounded-xl border border-gray-300 px-4 py-3 text-base
                            focus:border-indigo-500 focus:ring-indigo-500"
                    />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" value="Password" class="mb-1"/>
                    <x-text-input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="block w-full bg-white rounded-xl border border-gray-300 px-4 py-3 text-base
                                focus:border-indigo-500 focus:ring-indigo-500"
                    />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700
                           text-white py-3 rounded-xl font-semibold text-lg
                           transition duration-200">
                    Log In
                </button>
            </form>

        </div>
    </div>
</x-guest-layout>

<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 p-8 bg-white dark:bg-gray-900 rounded-lg shadow-lg">

        <!-- Heading -->
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-6 flex items-center justify-center">
            <i data-feather="lock" class="mr-2 text-indigo-600"></i>
            Login
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                    Email
                </label>
                <input id="email" name="email" type="email" required autofocus
                    class="w-full px-4 py-2 text-sm border rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                    Kata Sandi
                </label>
                <input id="password" name="password" type="password" required
                    class="w-full px-4 py-2 text-sm border rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                    <input type="checkbox" name="remember"
                        class="mr-2 rounded text-indigo-600 focus:ring-0" />
                    Ingat saya
                </label>
                <a href="{{ route('password.request') }}"
                    class="text-sm text-indigo-600 hover:underline">
                    Lupa sandi?
                </a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition duration-200 font-semibold">
                Masuk
            </button>
        </form>

        <!-- Register Link -->
        <p class="mt-6 text-sm text-center text-gray-700 dark:text-gray-300">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">
                Daftar sekarang
            </a>
        </p>
    </div>
</x-guest-layout>
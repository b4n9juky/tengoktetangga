<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 p-8 bg-white dark:bg-gray-900 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-6 flex items-center justify-center">
            <i data-feather="lock" class="mr-2 text-indigo-600"></i> Login
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <div class="relative mt-1">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i data-feather="mail"></i>
                    </span>
                    <input id="email" name="email" type="email" :value="old('email')" required autofocus
                        class="pl-10 pr-4 py-2 w-full rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        autocomplete="username">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <div class="relative mt-1">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i data-feather="lock"></i>
                    </span>
                    <input id="password" name="password" type="password" required
                        class="pl-10 pr-4 py-2 w-full rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        autocomplete="current-password">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 dark:border-gray-700 dark:bg-gray-800 rounded">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                    Remember me
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                    class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                    Forgot password?
                </a>
                @endif

                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i data-feather="log-in" class="mr-2"></i> Log in
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
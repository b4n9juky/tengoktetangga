<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="min-h-screen bg-gray-100 dark:bg-gray-900 flex items-center justify-center bg-cover bg-center bg-no-repeat"
    style="background-image: url('https://images.unsplash.com/photo-1503264116251-35a269479413')">


    <div class="w-full max-w-md px-6 py-8 space-y-6 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-2xl border border-white/20 dark:border-gray-700">

        <!-- Logo -->
        <div class="flex justify-center">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500" />
            </a>
        </div>

        <!-- Slot Konten (form login/register) -->
        <div>
            {{ $slot }}
        </div>
    </div>
</body>

</html>
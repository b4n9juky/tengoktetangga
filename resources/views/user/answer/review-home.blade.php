<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center gap-2">
            <i data-feather="bar-chart-2" class="w-6 h-6"></i>
            {{ __('Indeks Kuisioner') }}

        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <div class="bg-white dark:bg-gray-800 dark:text-gray-200 p-6 rounded shadow space-y-4">
            @foreach($scoresByTema as $item)




            <div class="flex items-center justify-between space-x-4">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold">{{ $item['tema']->nama_tema }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total skor: {{ $item['total_score'] }}</p>
                </div>

                <div class="w-1/3 h-4 rounded bg-gray-300 dark:bg-gray-700 overflow-hidden">
                    <div
                        class="h-4 rounded"
                        style="width: {{ min($item['total_score'] * 10, 100) }}%; background: linear-gradient(90deg, #4ade80, #3b82f6, #9333ea);"
                        title="Skor {{ $item['total_score'] }}">
                    </div>
                </div>
                <div class="shrink-0">
                    <a href="{{ route('answer.review', $surveyor->surveyor_id) }}"
                        class="inline-flex items-center gap-1 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700 transition">
                        <i data-feather="eye" class="w-4 h-4"></i>
                        Lihat
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
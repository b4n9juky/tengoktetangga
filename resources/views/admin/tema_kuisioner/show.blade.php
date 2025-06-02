<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 flex items-center space-x-2">
            <i data-feather="file-text" class="text-indigo-500"></i>
            <span>{{ __('Daftar Pertanyaan Admin') }}</span>
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 flex items-center space-x-2">
                        <i data-feather="list" class="text-blue-500"></i>
                        <span>Daftar Pertanyaan</span>
                    </h3>

                    <form method="GET" action="#" class="mb-6">
                        <div class="flex space-x-2">
                            <input type="text" name="search" placeholder="Cari pertanyaan..."
                                value="{{ request('search') }}"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring focus:ring-indigo-300 focus:outline-none transition" />
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center space-x-1">
                                <i data-feather="search"></i>
                                <span>Cari</span>
                            </button>
                        </div>
                    </form>
                </div>

                <ul class="space-y-4">
                    @forelse($q as $row)
                    <li class="p-4 bg-gray-50 dark:bg-gray-900 rounded-md shadow-sm hover:shadow-md transition-all">
                        <div class="flex items-start space-x-2 text-gray-800 dark:text-gray-100">
                            <i data-feather="check-circle" class="mt-1 text-green-500"></i>
                            <div>
                                <p class="font-medium">{{ $loop->iteration }}. {{ $row->text }}




                                </p>

                                @if($row->choices->count() > 0)
                                <ul class="mt-2 pl-5 list-disc text-sm text-gray-600 dark:text-gray-300 space-y-1">
                                    @foreach($row->choices as $index => $choice)
                                    <li>
                                        {{ chr(97 + $index) }}. {{ $choice->text }}
                                        <span class="ml-2 text-xs text-gray-500">(Bobot: {{ $choice->bobot }})</span>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif



                            </div>
                            <a href="{{route('tema.showDetails', $row->id)}}" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200 p-1.5 rounded hover:bg-indigo-50 dark:hover:bg-indigo-800"
                                title="Details"> <i data-feather="zoom-in"></i></a>
                        </div>
                    </li>
                    @empty
                    <p class="text-gray-500 dark:text-gray-300 text-center italic">Belum ada pertanyaan dibuat.</p>
                    @endforelse
                    <div class="mt-6">

                    </div>
                </ul>
            </div>
        </div>
    </div>

    {{-- Feather Icon Init --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lembar Observasi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 dark:text-gray-200 p-6 rounded-2xl shadow-xl">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold flex items-center gap-2">
                        <i data-feather="clipboard" class="w-5 h-5"></i>
                        Daftar Tema Kuisioner
                    </h3>
                </div>

                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-100">
                        Tema yang Belum Pernah Anda Kerjakan:
                    </h4>

                    @if($unansweredTemas->isEmpty())
                    <p class="text-gray-500 dark:text-gray-400">Anda sudah mengerjakan semua tema.</p>
                    @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($unansweredTemas as $tema)
                        <div class="border border-gray-200 dark:border-gray-700 rounded-xl p-4 bg-gray-50 dark:bg-gray-900 hover:bg-white dark:hover:bg-gray-800 transition-all shadow-sm hover:shadow-md">
                            <h5 class="text-base font-semibold text-gray-800 dark:text-white mb-2">{{ $tema->nama_tema }}</h5>
                            <a href="{{ route('answer.index', $tema->id) }}"
                                class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition-colors">
                                Kerjakan
                                <i data-feather="arrow-right" class="ml-2 w-4 h-4"></i>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Feather Icons --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight flex items-center space-x-2">
            <i data-feather="file-text" class="text-blue-500"></i>
            <span>{{ __('Tema Kuisioner') }}</span>
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-6 space-y-6">
                <form action="{{ route('questions.update', $question->id) }}" method="post" class="space-y-6">
                    @csrf


                    {{-- Input Soal --}}
                    <div>
                        <label for="question_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Soal</label>
                        <input
                            type="text"
                            name="question_text"
                            id="question_text"
                            value="{{ $question->text }}"
                            required
                            class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-blue-500">
                    </div>

                    {{-- Pilihan Jawaban --}}
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Pilihan Jawaban</h4>
                        <div class="space-y-4">
                            @foreach ($question->choices as $index => $choice)
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                <input type="hidden" name="choices[{{ $index }}][id]" value="{{ $choice->id }}">

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Teks Jawaban</label>
                                    <input
                                        type="text"
                                        name="choices[{{ $index }}][text]"
                                        value="{{ $choice->text }}"
                                        class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-blue-400">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Bobot</label>
                                    <input
                                        type="number"
                                        name="choices[{{ $index }}][bobot]"
                                        value="{{ $choice->bobot }}"
                                        class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-blue-400">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-300">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Inisialisasi Feather Icon --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.feather) {
                feather.replace();
            }
        });
    </script>
</x-app-layout>
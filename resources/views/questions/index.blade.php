<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Pertanyaan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <a href="{{ route('questions.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Pertanyaan</a>

                @foreach($questions as $question)
                <div class="border-b border-gray-300 pb-4 mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $question->text }}
                        <span class="text-sm text-gray-500 ml-2">({{ $question->type == 'multiple_choice' ? 'Pilihan Ganda' : 'Isian Singkat' }})</span>
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Bobot: {{ $question->bobot }}</p>

                    @if($question->type === 'multiple_choice')
                    <ul class="list-disc pl-6 mt-2 text-gray-700 dark:text-gray-200">
                        @foreach($question->choices as $choice)
                        <li>{{ $choice->text }}</li>
                        @endforeach
                    </ul>
                    @else
                    <p class="mt-2 italic text-gray-500">Jawaban: <span class="text-gray-800 dark:text-gray-300">[Isian oleh pengguna]</span></p>
                    @endif
                </div>
                @endforeach

                @if($questions->isEmpty())
                <p class="text-gray-600 dark:text-gray-300">Belum ada pertanyaan yang dibuat.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
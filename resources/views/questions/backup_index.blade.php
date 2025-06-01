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


                <form action="{{ route('questions.answer') }}" method="POST">
                    @csrf

                    @foreach ($questions as $question)
                    <div class="mb-6">
                        <label class="block mb-2 text-lg font-semibold text-gray-800">
                            {{$loop->iteration}}. {{ $question->text }}
                        </label>

                        @if ($question->type === 'short_answer')
                        <textarea name="answers[{{ $question->id }}]" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>

                        @elseif ($question->type === 'multiple_choice')
                        <div class="space-y-3 mt-2">
                            @foreach ($question->choices as $option)
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $option->id }}" class="peer sr-only">
                                <div class="w-5 h-5 mr-3 border-2 border-gray-400 rounded-md 
                            peer-checked:bg-blue-600 
                            peer-checked:border-blue-600 
                            peer-checked:after:content-['✔'] 
                            peer-checked:after:text-white 
                            peer-checked:after:text-xs 
                            peer-checked:after:ml-[2px] 
                            peer-checked:after:mt-[-2px] 
                            peer-checked:after:block">
                                </div>
                                <span class="text-gray-700">{{ $option->text }}</span>
                            </label>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach

                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Kirim Jawaban
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
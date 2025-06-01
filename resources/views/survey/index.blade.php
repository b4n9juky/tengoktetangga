<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Form Survey</h3>
                    <a href="{{ route('survey.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Pertanyaan</a>
                    <form action="{{ route('survey.store') }}" method="POST">
                        @csrf

                        @foreach ($questions as $question)
                        <div class="mb-4">
                            <label><strong>{{ $question->text }}</strong></label><br>

                            @if ($question->type === 'short_answer')
                            <textarea name="answers[{{ $question->id }}]" class="form-control" required></textarea>
                            @elseif ($question->type === 'multiple_choice')
                            @foreach ($question->options as $option)
                            <div class="form-check">
                                <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $option->id }}" class="form-check-input">
                                <label class="form-check-label">{{ $option->text }}</label>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        @endforeach

                        <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
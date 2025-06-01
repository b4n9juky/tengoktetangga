<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Review Quesioner') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 dark:text-gray-200 p-6 rounded shadow">


                @php
                $totalKeseluruhanBobot = 0;
                @endphp

                @foreach ($answers as $answer)
                <div class="qa-item border-b border-gray-300 py-2">
                    <div class="question font-semibold">
                        {{ $loop->iteration }}. {{ $answer->question->text }}
                    </div>

                    <div class="answer pl-4">
                        @if ($answer->question->type === 'short_answer')
                        <label>Jawaban: {{ $answer->answer_text }}</label>
                        @elseif ($answer->question->type === 'multiple_choice')
                        @php
                        $totalBobot = 0;
                        @endphp
                        <ul>
                            @foreach ($answer->choices as $choice)
                            <li class="py-1">
                                Jawaban: {{ $choice->text }} (Bobot: {{ $choice->bobot }})
                            </li>
                            @php
                            $totalBobot += $choice->bobot;
                            $totalKeseluruhanBobot += $choice->bobot;
                            @endphp
                            @endforeach
                        </ul>
                        <div class="font-bold">
                            Total Bobot Jawaban Ini: {{ $totalBobot }}
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach





            </div>



            <div class="mt-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between bg-blue-50 p-4 rounded-xl border border-blue-200">
                    <div>
                        @if ($totalKeseluruhanBobot > 0)
                        <h3 class="text-xl font-semibold text-blue-700"> Score Anda Adalah : {{ $totalKeseluruhanBobot }}</h3>
                        @endif
                        <p class="text-sm text-blue-600">Klik tombol di bawah untuk mulai mengisi kuesioner.</p>
                    </div>
                    <a href="{{route('answer.edit',$answer->surveyor_id)}}" class="mt-4 sm:mt-0 inline-block bg-blue-600 text-white text-sm font-medium px-6 py-3 rounded-xl hover:bg-blue-700 transition-all duration-200">
                        Revisi Jawaban Kuesioner

                    </a>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>
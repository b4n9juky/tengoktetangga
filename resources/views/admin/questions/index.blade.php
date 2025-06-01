<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Pertanyaan Admin') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <a href="{{route('questions.create')}}">

                    <x-primary-button>buat pertanyaan</x-primary-button></a>


                <h2 class="text-white m-2 ">Daftar Pertanyaan</h2>
                <ul>
                    @foreach($questions as $row)
                    <li class="px-2 py-2">
                        {{$loop->iteration}}.{{ $row->text }}
                        @if($row->choices->count() > 0)
                        <ul>
                            @foreach($row->choices as $index => $choice)
                            <li>
                                {{ chr(97 + $index) }}. {{ $choice->text }} (Bobot: {{ $choice->bobot }})
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>



</x-app-layout>
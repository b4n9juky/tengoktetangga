<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100 text-lg font-medium">
                    {{ __("You're logged in!") }}
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                        {{-- Card: Biodata --}}
                        <div class="rounded-xl shadow-md bg-white dark:bg-gray-700 p-6 text-center transition transform hover:scale-105 hover:shadow-lg">
                            @if ($hasBiodata)
                            <a href="{{ route('biodata.edit') }}">
                                <img src="{{ asset('storage/icons/biodata.png') }}" alt="Biodata Icon" class="w-24 h-24 mx-auto mb-4 aspect-square object-contain">
                            </a>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Biodata</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Edit Biodata Responden</p>
                            @else
                            <a href="{{ route('surveyors.create') }}">
                                <img src="{{ asset('storage/icons/biodata.png') }}" alt="Biodata Icon" class="w-24 h-24 mx-auto mb-4 aspect-square object-contain">
                            </a>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Biodata Responden</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Isi Biodata Sebelum Mengisi Kuisioner</p>
                            @endif
                        </div>

                        {{-- Card: Quesioner --}}
                        <div class="rounded-xl shadow-md bg-white dark:bg-gray-700 p-6 text-center transition transform hover:scale-105 hover:shadow-lg">
                            @if ($hasBiodata && !$hasAnswer)
                            <a href="{{ route('questioners.indexList') }}">
                                <img src="{{ asset('storage/icons/question.png') }}" alt="Question Icon" class="w-24 h-24 mx-auto mb-4 aspect-square object-contain">
                            </a>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Kuisioner</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Ikuti Kuisioner dari Daftar yang Tersedia</p>
                            @elseif ($hasBiodata && $hasAnswer)
                            <img src="{{ asset('storage/icons/question.png') }}" alt="Question Icon" class="w-24 h-24 mx-auto mb-4 aspect-square object-contain">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Kuisioner</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">
                                Sudah Mengisi Kuisioner
                                <br>
                                <a href="{{route('questioners.indexList')}}" class="text-blue-600 dark:text-blue-400 underline text-sm">Lihat Kuisioner yang Diikuti</a>
                            </p>
                            @else
                            <div class="cursor-not-allowed opacity-50">
                                <img src="{{ asset('storage/icons/question.png') }}" alt="Question Icon" class="w-24 h-24 mx-auto mb-4 aspect-square object-contain">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Kuisioner</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Isi Biodata Terlebih Dahulu</p>
                            </div>
                            @endif
                        </div>

                        {{-- Card: Review --}}
                        <div class="rounded-xl shadow-md bg-white dark:bg-gray-700 p-6 text-center transition transform hover:scale-105 hover:shadow-lg">
                            @if ($hasAnswer)
                            <a href="{{ route('answer.indexKuisioner') }}">
                                <img src="{{ asset('storage/icons/review.png') }}" alt="Review Icon" class="w-24 h-24 mx-auto mb-4 aspect-square object-contain">
                            </a>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Review</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Lihat dan Tinjau Jawaban Kuisioner</p>
                            @else
                            <div class="cursor-not-allowed opacity-50">
                                <img src="{{ asset('storage/icons/review.png') }}" alt="Review Icon" class="w-24 h-24 mx-auto mb-4 aspect-square object-contain">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Review</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Belum Ada Kuisioner untuk Direview</p>
                            </div>
                            @endif
                        </div>

                        {{-- Card: Observasi --}}

                        <div class="rounded-xl shadow-md bg-white dark:bg-gray-700 p-6 text-center transition transform hover:scale-105 hover:shadow-lg">
                            @if ($hasAnswer)
                            <a href="{{ route('observasi.index') }}">
                                <img src="{{ asset('storage/icons/info.png') }}" alt="Observasi Icon" class="w-24 h-24 mx-auto mb-4 aspect-square object-contain">
                            </a>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Observasi</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Lihat Hasil Observasi dari Kuisioner</p>
                            @else
                            <div class="cursor-not-allowed opacity-50">
                                <img src="{{ asset('storage/icons/info.png') }}" alt="Review Icon" class="w-24 h-24 mx-auto mb-4 aspect-square object-contain">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Observasi</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Isi Biodata & Kuisioner dulu !</p>
                            </div>
                            @endif
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
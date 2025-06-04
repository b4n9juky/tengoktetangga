<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Skoring Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">


                <div class="p-6">


                    <h1>{{$skor}}</h1>
                    <h2>{{$total}}</h2>
                    <p>rentang: {{ $skor->nilai_awal }} - {{ $skor->nilai_akhir }}</p>



                </div>
            </div>
</x-app-layout>
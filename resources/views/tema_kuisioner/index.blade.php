<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tema Quisioner') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Tema Kuisioner</a>

                @foreach($tema as $row)
                <div class="border-b border-gray-300 pb-4 mb-4">
                    <div class="flex items-center mb-5">
                        <span class="bg-blue-500 rounded shadow inline py-2 px-2"><i data-feather="check"></i></span>
                        <h2 class="text-lg px-2 py-2">{{$row->nama_tema}} :</h2>

                    </div>
                    <div class="flex items-center">
                        <span class="bg-green-500 rounded shadow inline py-2 px-2"><i data-feather="arrow-right"></i></span>
                        <p class="text-sm px-2 py-2">{{$row->deskripsi}}</p>
                    </div>
                </div>
                @endforeach
                @if($tema->isEmpty())
                <p class="text-gray-600 dark:text-gray-300">Belum ada pertanyaan yang dibuat.</p>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Skor
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
                @endif



                <form method="post" action="{{route('skor.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Skor Awal</label>
                        <input type="number" name="nilai_awal" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Skor Akhir</label>
                        <input type="number" name="nilai_akhir" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Keterangan</label>
                        <input type="text" name="keterangan" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="0" required
                                class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="ml-2 text-gray-700 dark:text-gray-200">Aktif</span>
                        </label>

                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="1" required
                                class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="ml-2 text-gray-700 dark:text-gray-200">Tidak Aktif</span>
                        </label>
                    </div>

                    <x-secondary-button type="submit">Submit</x-secondary-button>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
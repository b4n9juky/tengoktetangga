<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Kondisi
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



                <form method="post" action="{{route('kondisi.update',$kondisi->id) }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Kondisi</label>
                        <input type="text" name="nama" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            value="{{$kondisi->nama}}">
                    </div>
                    <button type="submit" class="inline-flex items-center px-3 py-1.5 text-sm bg-indigo-600 hover:bg-red-700 text-white rounded-md transition">Update</button>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
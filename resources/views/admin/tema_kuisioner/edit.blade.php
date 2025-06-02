<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Pertanyaan Baru Quesioner Tetangga
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">


                <form method="post" action="{{route('tema.update',$tema->id)}}">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nama Tema Kuisioner</label>
                        <input type="text" name="nama_tema" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{$tema->nama_tema}}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" placeholder="Isi Deskripsi yang sesuai dengan tema kuisioner"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white resize-none">{{$tema->nama_tema}}</textarea>

                    </div>
                    <x-primary-button>Simpan</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
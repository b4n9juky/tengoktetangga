<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">

                <form action="{{ route('kegiatan.simpan') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" id="judul" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-500" required></textarea>
                    </div>

                    <div>
                        <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                        <input type="text" name="lokasi" id="lokasi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-500" required>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="waktu_mulai" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                            <input type="datetime-local" name="waktu_mulai" id="waktu_mulai" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label for="waktu_selesai" class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                            <input type="datetime-local" name="waktu_selesai" id="waktu_selesai" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-500" required>
                        </div>
                    </div>

                    <div>
                        <label for="bentuk_kegiatan" class="block text-sm font-medium text-gray-700">Bentuk Kegiatan</label>
                        <select name="bentuk_id" id="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-500" required>
                            @foreach($bentuk as $b)
                            <option value="{{$b->id}}">{{$b->nama_bentuk}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
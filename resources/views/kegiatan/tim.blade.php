<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kegiatan') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">



                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
                @endif


                <!-- <div class="w-full max-w-md space-y-8 bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg"> -->
                <div>
                    <h2 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white">Tambah Tim untuk Kegiatan: </h2>
                    <h1 class="text-center text-4xl font-extrabold text-blue-900 dark:text-white">{{ $kegiatan->judul }}</h1>

                </div>

                <form action="{{ route('kegiatan.tim.store', $kegiatan->id) }}" method="POST" class="mt-8 space-y-6">
                    @csrf
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div class="mb-4">
                            <label for="nama_tim" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Tim</label>
                            <input type="text" class="appearance-none rounded-md relative block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white bg-white dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" name="nama_tim" value="{{ old('nama_tim') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="ketua_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ketua Tim</label>
                            <select name="ketua_id" class="appearance-none rounded-md relative block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white bg-white dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" required>
                                <option value="">-- Pilih Ketua Tim --</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <button type="submit"
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                                Simpan
                            </button>
                        </div>
                        <div class="flex items-center">
                            <button type="submit"
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                                Batal
                            </button>
                        </div>
                    </div>

                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>

</x-app-layout>
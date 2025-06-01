<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kegiatan') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <div class="container">
                    <h3>Form Bentuk Kegiatan</h3>

                    <form action="{{ route('kegiatan.simpanBentuk') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="judul" class="form-label">Nama Bentuk Kegiatan</label>
                            <input type="text" name="nama_bentuk" id="judul" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="bentuk_kegiatan" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id=""></textarea>
                        </div>


                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
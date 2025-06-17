<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 flex items-center gap-2">
            <i data-feather="file-text" class="w-5 h-5 text-blue-500"></i>
            {{ __('Form Observasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 space-y-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white flex items-center gap-2">
                    <i data-feather="clipboard" class="w-6 h-6 text-indigo-500"></i>
                    Form Observasi
                </h2>

                <form method="post" action="{{ route('observasi.store') }}" class="space-y-6">
                    @csrf

                    <input type="hidden" name="surveyor_id" value="{{ $surveyor->id }}">

                    <div>
                        <label for="tanggal_kunjungan" class="flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            <i data-feather="calendar" class="w-4 h-4"></i> Tanggal Kunjungan
                        </label>
                        <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div>
                        <label for="nama_tetangga" class="flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            <i data-feather="user" class="w-4 h-4"></i> Nama Tetangga
                        </label>
                        <input type="text" name="nama_tetangga" id="nama_tetangga" placeholder="Nama Tetangga"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div>
                        <label for="alamat" class="flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            <i data-feather="map-pin" class="w-4 h-4"></i> Alamat
                        </label>
                        <textarea name="alamat" id="alamat" rows="3" placeholder="Alamat Tetangga"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white resize-none" required></textarea>
                    </div>

                    <div>
                        <label class="flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            <i data-feather="activity" class="w-4 h-4"></i> Kondisi Teramati
                        </label>
                        <div id="kondisi-container" class="space-y-3 mt-2">
                            <div class="flex space-x-2 items-center">
                                <select name="kondisi_teramati[]" class="w-2/3 px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white">
                                    @foreach ($kondisis as $kondisi)
                                    <option value="{{ $kondisi->id }}">{{ $kondisi->nama }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="nilai_kondisi[]" placeholder="Jumlah"
                                    class="w-1/3 px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white" required>
                                <button type="button" onclick="hapusKondisi(this)" class="text-red-600 hover:text-red-800 text-xl font-bold px-2">&times;</button>
                            </div>
                        </div>
                        <button type="button" onclick="tambahKondisi()" class="text-sm text-blue-600 hover:underline mt-2">+ Tambah Kondisi</button>
                    </div>

                    <div>
                        <label for="bentuk_interaksi" class="flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            <i data-feather="users" class="w-4 h-4"></i> Bentuk Interaksi
                        </label>
                        <textarea name="bentuk_interaksi" id="bentuk_interaksi" rows="3" placeholder="Tuliskan bentuk interaksi"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white resize-none" required></textarea>
                    </div>

                    <div>
                        <label for="catatan_tambahan" class="flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            <i data-feather="file-plus" class="w-4 h-4"></i> Rekomendasi / Catatan Tambahan
                        </label>
                        <textarea name="catatan_tambahan" id="catatan_tambahan" rows="3" placeholder="Catatan tambahan jika ada"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white resize-none"></textarea>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150">
                            <i data-feather="save" class="inline w-5 h-5 mr-2 -mt-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Feather Icons --}}
    <script>
        function tambahKondisi() {
            const container = document.getElementById('kondisi-container');
            const opsi = `{!! $kondisis->map(fn($k) => "<option value='{$k->id}'>{$k->nama}</option>")->implode('') !!}`;

            const div = document.createElement('div');
            div.className = 'flex space-x-2 items-center mt-2';
            div.innerHTML = `
                <select name="kondisi_teramati[]" class="w-2/3 px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white">
                    ${opsi}
                </select>
                <input type="number" name="nilai_kondisi[]" placeholder="Jumlah"
                    class="w-1/3 px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white">
                <button type="button" onclick="hapusKondisi(this)" class="text-red-600 hover:text-red-800 text-xl font-bold px-2">&times;</button>
            `;
            container.appendChild(div);
            feather.replace(); // Refresh ikon setelah DOM update
        }

        function hapusKondisi(button) {
            button.parentElement.remove();
        }

        document.addEventListener('DOMContentLoaded', () => {
            feather.replace();
        });
    </script>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lembar Observasi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 dark:text-gray-200 p-6 rounded-2xl shadow-lg">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold flex items-center gap-2">
                        <i data-feather="clipboard"></i>
                        Daftar Observasi
                    </h3>
                    <a href="{{ route('observasi.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                        <i data-feather="plus" class="mr-2"></i> Isi Lembar Observasi
                    </a>
                </div>

                @if ($observasi->count() > 0)
                <div class="overflow-x-auto rounded-lg shadow-sm">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">📅 Tanggal</th>
                                <th class="px-4 py-2 text-left">👤 Nama Tetangga</th>
                                <th class="px-4 py-2 text-left">📍 Alamat</th>
                                <th class="px-4 py-2 text-left">🔍 Kondisi</th>
                                <th class="px-4 py-2 text-left">🤝 Interaksi</th>
                                <th class="px-4 py-2 text-left">🕒 Dibuat</th>
                                <th class="px-4 py-2 text-left">⚙️ Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($observasi as $row)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-4 py-2">{{ $row->tanggal_kunjungan }}</td>
                                <td class="px-4 py-2">{{ $row->nama_tetangga }}</td>
                                <td class="px-4 py-2">{{ $row->alamat }}</td>
                                <td class="px-4 py-2">{{ $row->kondisi_teramati }}</td>
                                <td class="px-4 py-2">{{ $row->bentuk_interaksi }}</td>
                                <td class="px-4 py-2 text-xs text-gray-500 dark:text-gray-400">
                                    {{ $row->created_at->diffForHumans() }}
                                </td>
                                <td class="px-4 py-2 flex gap-2 flex-wrap">
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('observasi.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded-md transition">
                                            <i data-feather="trash" class="mr-1 w-4 h-4"></i> Hapus
                                        </button>
                                    </form>

                                    <!-- Tombol Ubah -->
                                    <a href="{{ route('observasi.edit', $row->id) }}"
                                        class="inline-flex items-center px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-semibold rounded-md transition">
                                        <i data-feather="edit-3" class="mr-1 w-4 h-4"></i> Ubah
                                    </a>

                                    <!-- Tombol Dokumentasi -->
                                    <a href="{{ route('observasi.showform', $row->id) }}"
                                        class="inline-flex items-center px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold rounded-md transition">
                                        <i data-feather="image" class="mr-1 w-4 h-4"></i> Dokumentasi
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-gray-500 dark:text-gray-400">Belum ada data observasi.</p>
                @endif
            </div>
        </div>
    </div>

    {{-- Feather Icons --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
</x-app-layout>
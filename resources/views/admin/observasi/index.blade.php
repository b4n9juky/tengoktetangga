<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight flex items-center space-x-3">
            <i data-feather="clipboard" class="text-blue-600"></i>
            <span>{{ __('Observasi') }}</span>
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <x-alert type="success" title="Berhasil!" :message="session('success')" />
            @endif

            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-xl transition duration-500 ease-in-out">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse border border-gray-200 dark:border-gray-700">
                        <thead class="text-white" style="background: linear-gradient(90deg, #3b82f6, #8b5cf6);">
                            <tr>
                                <th class="px-4 py-3 text-left uppercase text-xs">No</th>
                                <th class="px-4 py-3 text-left uppercase text-xs">Responden</th>
                                <th class="px-4 py-3 text-left uppercase text-xs">Tanggal Kunjungan</th>
                                <th class="px-4 py-3 text-left uppercase text-xs">Nama Tetangga</th>
                                <th class="px-4 py-3 text-left uppercase text-xs">Alamat</th>
                                <th class="px-4 py-3 text-left uppercase text-xs">Kondisi Teramati</th>
                                <th class="px-4 py-3 text-left uppercase text-xs">Bentuk Interaksi</th>
                                <th class="px-4 py-3 text-left uppercase text-xs">Catatan</th>
                                <th class="px-4 py-3 text-center uppercase text-xs">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($observasi as $row)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                    {{$loop->iteration}}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    {{$row->surveyor->nama}}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                    {{ \Carbon\Carbon::parse($row->tanggal_kunjungan)->format('d M Y') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    {{$row->nama_tetangga}}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300 max-w-xs truncate">
                                    {{$row->alamat}}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300 max-w-xs truncate">
                                    {{$row->kondisi_teramati}}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300 max-w-xs truncate">
                                    {{$row->bentuk_interaksi}}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300 max-w-xs truncate">
                                    {{$row->catatan_tambahan ?? '-'}}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-center">
                                    <a href="#"
                                        class="inline-flex items-center px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                        <i data-feather="trash" class="w-4 h-4 mr-1"></i> Hapus
                                    </a>
                                    <a href="{{route('admin.observasiDetail',$row->id)}}"
                                        class="inline-flex items-center px-3 py-1 bg-indigo-600 text-white rounded-md hover:bg-red-700 transition">
                                        <i data-feather="image" class="w-4 h-4 mr-1"></i>Dokumentasi
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @if($observasi->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center py-6 text-gray-500 dark:text-gray-400">
                                    Tidak ada data observasi.
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Feather Icon Init --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>
</x-app-layout>
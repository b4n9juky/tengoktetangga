<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight flex items-center space-x-3">
            <i data-feather="activity" class="text-indigo-500"></i>
            <span>{{ __('Skoring Kuisioner') }}</span>
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
            <x-alert type="success" title="Berhasil!" :message="session('success')" />
            @endif

            <div class="flex justify-between">
                <a href="{{ route('skor.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg shadow transition duration-200">
                    <i data-feather="plus-circle" class="mr-2 w-4 h-4"></i> Tambah Skor
                </a>
            </div>

            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-xl transition duration-500 ease-in-out">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gradient-to-r from-blue-500 to-violet-500 text-white text-xs uppercase tracking-wider">
                            <tr>
                                <th class="px-4 py-3 text-left">No</th>
                                <th class="px-4 py-3 text-left">Skor Awal</th>
                                <th class="px-4 py-3 text-center">Skor Akhir</th>
                                <th class="px-4 py-3 text-center">Keterangan</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th class="px-4 py-3 text-center">Aksi</th>

                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($skor as $row)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                                <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                                    {{ $row->nilai_awal }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                                    {{ $row->nilai_akhir }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                                    {{ $row->keterangan }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                                    @if($row->is_active === 0)
                                    {{'aktif'}}
                                    @else
                                    {{'tidak aktif'}}
                                    @endif
                                </td>

                                <td class="px-4 py-3 text-center space-x-2">
                                    <a href="{{ route('skor.edit', $row->id) }}"
                                        class="inline-flex items-center px-3 py-1.5 text-sm bg-yellow-500 hover:bg-yellow-600 text-white rounded-md transition">
                                        <i data-feather="edit-3" class="w-4 h-4 mr-1"></i> Ubah
                                    </a>
                                    <form action="{{ route('skor.destroy', $row->id) }}" method="POST"
                                        class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kondisi ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 text-sm bg-red-600 hover:bg-red-700 text-white rounded-md transition">
                                            <i data-feather="trash" class="w-4 h-4 mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-6 text-gray-500 dark:text-gray-400">
                                    <i data-feather="alert-circle" class="inline w-5 h-5 mr-1 text-yellow-400"></i>
                                    Tidak ada data skor
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lembar Observasi') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
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

                @if ($observasis->count() > 0)
                <div class="grid gap-4 md:grid-cols-2">
                    @foreach($observasis as $index => $row)
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4 shadow transition hover:shadow-lg">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">
                                    {{ $row->nama_tetangga }}
                                </h4>
                                <p class="text-sm text-gray-500 dark:text-gray-300">
                                    📍 {{ $row->alamat }}
                                </p>
                            </div>
                            <span class="text-xs text-gray-500 dark:text-gray-300">
                                {{ $row->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <div class="space-y-1 text-sm text-gray-700 dark:text-gray-200">
                            <p><strong>📅 Tanggal:</strong> {{ $row->tanggal_kunjungan ?? '-'  }}</p>
                            <p><strong>🔍 Kondisi:</strong> {{ $row->nama_kondisis ?? '-' }}</p>
                            <p><strong>🤝 Interaksi:</strong> {{ $row->bentuk_interaksi ?? '-'  }}</p>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
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

                            <!-- Tombol Hapus -->
                            <form action="{{ route('observasi.destroy', $row->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded-md transition">
                                    <i data-feather="trash" class="mr-1 w-4 h-4"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 dark:text-gray-400">Belum ada data observasi.</p>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
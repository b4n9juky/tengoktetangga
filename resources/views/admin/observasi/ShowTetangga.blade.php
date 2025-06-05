<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight flex items-center space-x-3">
            <i data-feather="clipboard" class="text-blue-600"></i>
            <span>{{ __('Show Kondisi') }}</span>
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <x-alert type="success" title="Berhasil!" :message="session('success')" />
            @endif

            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-xl transition duration-500 ease-in-out">
                <div class="overflow-x-auto">



                    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                        <div class="bg-white shadow-xl rounded-2xl p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">📋 Data Observasi Tetangga</h2>
                            <h2 class="text-sm font-bold text-gray-800 mb-6">Kondisi: {{$kondisi->nama}}</h2>

                            @if($observasis->isEmpty())
                            <div class="text-center text-gray-500">
                                Tidak ada data observasi ditemukan.
                            </div>
                            @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 text-sm">
                                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                                        <tr>
                                            <th class="px-4 py-3 text-left">No</th>
                                            <th class="px-4 py-3 text-left">Sasaran</th>
                                            <th class="px-4 py-3 text-left">Alamat</th>
                                            <th class="px-4 py-3 text-left">Pelapor</th>
                                            <th class="px-4 py-3 text-left">No HP</th>
                                            {{-- Tambah kolom lain jika diperlukan --}}
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($observasis as $index => $observasi)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium text-gray-800">{{ $index + 1 }}</td>
                                            <td class="px-4 py-2">{{ $observasi->nama_tetangga ?? '-' }}</td>
                                            <td class="px-4 py-2">{{ $observasi->alamat ?? '-' }}</td>
                                            <td class="px-4 py-2">{{ $observasi->surveyor->nama ?? '-' }}</td>
                                            <td class="px-4 py-2">{{ $observasi->surveyor->no_hp ?? '-' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif

                            <div class="mt-6">
                                <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                    ← Kembali
                                </a>
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
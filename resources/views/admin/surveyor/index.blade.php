<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Responden') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 dark:text-gray-200 p-6 rounded-2xl shadow-lg">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Data Responden</h3>

                </div>


                <div class="overflow-x-auto rounded-lg shadow-sm">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">Nama </th>
                                <th class="px-4 py-2 text-left">Kelas</th>
                                <th class="px-4 py-2 text-left">Tema</th>
                                <th class="px-4 py-2 text-left">Skor</th>

                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($responden as $siswa)
                            @php
                            $skorTema = [];

                            foreach ($siswa->answers as $answer) {
                            $tema = $answer->question->tema->nama_tema ?? 'Tanpa Tema';

                            foreach ($answer->choices as $choice) {
                            if (!isset($skorTema[$tema])) {
                            $skorTema[$tema] = 0;
                            }

                            $skorTema[$tema] += $choice->bobot;
                            }
                            }
                            @endphp
                            @foreach($skorTema as $tema => $skor)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $siswa->nama }}</td>
                                <td class="px-4 py-2">{{ $siswa->kelas}}</td>
                                <td class="px-4 py-2">{{ $tema }}</td>

                                <td class="px-4 py-2">{{ $skor}}</td>

                                <td class="px-4 py-2 text-xs text-gray-500 dark:text-gray-400">
                                    <a href="{{ route('observasi.create') }}"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                                        + Ajukan Jadi Kegiatan
                                    </a>
                                    <a href="{{ route('observasi.create') }}"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                                        x Hapus
                                    </a>
                                    <a href="{{ route('observasi.create') }}"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                                        +ubah
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
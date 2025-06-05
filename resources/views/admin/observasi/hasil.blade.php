<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center space-x-2">
            <i data-feather="bar-chart-2" class="w-5 h-5 text-indigo-500"></i>
            <span>{{ __('Hasil Observasi') }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border dark:border-gray-700">
                <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white flex items-center space-x-2">
                    <i data-feather="layers" class="w-5 h-5 text-blue-500"></i>
                    <span>Rekapitulasi Jumlah Sesuai Kondisi</span>
                </h3>

                <table class="w-full text-left table-auto border border-collapse border-gray-300 dark:border-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white">
                        <tr>
                            <th class="p-2 border">No</th>
                            <th class="p-2 border">Kondisi</th>
                            <th class="p-2 border">Jumlah Responden</th>
                            <th class="p-2 border">Jumlah</th>
                            <th class="p-2 border">Details</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-200">
                        @foreach ($hasil as $index => $item)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="p-2 border">{{ $index + 1 }}</td>
                            <td class="p-2 border">{{ $item['nama'] }}</td>
                            <td class="p-2 border">{{ $item['jumlah_responden'] }}</td>
                            <td class="p-2 border">{{ $item['total_nilai'] }}</td>
                            <td class="p-2 border text-center">
                                <a href="{{ route('showtetangga', $item['id']) }}"
                                    class="inline-flex items-center px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">
                                    <i data-feather="eye" class="w-4 h-4 mr-1"></i> Lihat
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


</x-app-layout>
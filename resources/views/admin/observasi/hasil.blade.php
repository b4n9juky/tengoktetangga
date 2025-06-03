<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hasil Observasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border dark:border-gray-700">
                <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Rekapitulasi Jumlah Sesuai Kondisi</h3>

                <table class="w-full text-left table-auto border border-collapse border-gray-300 dark:border-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white">
                        <tr>
                            <th class="p-2 border">No</th>
                            <th class="p-2 border">Kondisi</th>
                            <th class="p-2 border">Jumlah Responden</th>
                            <th class="p-2 border">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-200">
                        @foreach ($hasil as $index => $item)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="p-2 border">{{ $index + 1 }}</td>
                            <td class="p-2 border">{{ $item['nama'] }}</td>
                            <td class="p-2 border">{{ $item['jumlah_responden'] }}</td>
                            <td class="p-2 border">{{ $item['total_nilai'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
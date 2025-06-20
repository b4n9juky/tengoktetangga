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
                            @php $no = $responden->firstItem(); @endphp
                            @foreach($responden as $siswa)
                            @foreach($siswa->skor_tema as $tema => $skor)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-4 py-2">{{$no++}}</td>
                                <td class="px-4 py-2">{{ $siswa->nama }}</td>
                                <td class="px-4 py-2">{{ $siswa->kelas}}</td>
                                <td class="px-4 py-2">{{ $tema }}</td>

                                <td class="px-4 py-2">{{ $skor}}</td>

                                <td class="px-4 py-2 text-xs text-gray-500 dark:text-gray-400">


                                    <form action="{{ route('surveyor.destroy', $siswa->id) }}" method="POST"
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
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $responden->links() }}


            </div>
        </div>
    </div>
</x-app-layout>
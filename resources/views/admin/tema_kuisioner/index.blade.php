<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight flex items-center space-x-2">
            <i data-feather="file-text" class="text-blue-500"></i>
            <span>{{ __('Tema Kuisioner') }}</span>
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            @if (session('success'))
            <x-alert type="success" title="Berhasil!" :message="session('success')" />
            @endif
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg transition-all duration-300">
                <a href="{{route('tema.create')}}"
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-indigo-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg inline-block mb-6 shadow-md transition duration-300">
                    <i data-feather="plus-circle" class="inline-block mr-2 -mt-1"></i>
                    Tambah Tema Kuisioner
                </a>

                @forelse($tema as $row)
                <div class="border-l-4 border-blue-500 pl-5 py-5 bg-gray-50 dark:bg-gray-900 rounded-md shadow-sm mb-6 transition-all hover:shadow-md relative">
                    <div class="flex items-center justify-between mb-3 space-x-3">
                        <div class="flex items-center space-x-3">
                            <i data-feather="layers" class="text-blue-500"></i>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{$row->nama_tema}}</h3>

                        </div>

                        <div class="flex space-x-2">


                            <a href="{{ route('tema.edit', $row->id) }}"
                                class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200 p-1.5 rounded hover:bg-indigo-50 dark:hover:bg-indigo-800"
                                title="Edit">
                                <i data-feather="edit-3"></i>
                            </a>
                            <form action="{{ route('tema.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tema ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:text-red-800 transition-colors duration-200 p-1.5 rounded hover:bg-red-50 dark:hover:bg-red-800"
                                    title="Hapus">
                                    <i data-feather="trash-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i data-feather="info" class="text-green-500 mt-1"></i>

                        <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                            {{$row->deskripsi}}
                        </p>


                    </div>

                    <a href="{{ route('questions.create', $row->id) }}"
                        class="inline-flex items-center bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-2 rounded-md shadow-md hover:from-emerald-600 hover:to-green-700 transition duration-300 mt-4">
                        <i data-feather="plus-square" class="w-4 h-4 mr-2"></i>
                        Tambah Pertanyaan
                    </a>
                    <a href="{{ route('tema.showQuestions', $row->id) }}"
                        class="inline-flex items-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 rounded-md shadow-md hover:from-emerald-600 hover:to-green-700 transition duration-300 mt-4">
                        <i data-feather="plus-square" class="w-4 h-4 mr-2"></i>
                        Lihat Pertanyaan
                    </a>
                </div>
                @empty
                <p class="text-gray-500 dark:text-gray-300 text-center italic">Belum ada tema kuisioner yang dibuat.</p>
                @endforelse

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
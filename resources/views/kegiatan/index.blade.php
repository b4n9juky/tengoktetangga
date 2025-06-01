<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kegiatan') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">

                <h1>Daftar Kegiatan</h1>

                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif


                @if(Auth::user()->role->value == 'pelaksana')
                <a href="{{ route('kegiatan.create') }}" class="btn btn-primary mb-3">
                    <x-secondary-button>Usulkan Kegiatan Baru</x-secondary-button></a>
                @endif
                @if(Auth::user()->role->value == 'admin')
                <a href="{{ route('kegiatan.bentuk') }}" class="btn btn-primary mb-3">
                    <x-secondary-button>Tambah Bentuk Kegiatan</x-secondary-button></a>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white sticky top-0">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">No</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Judul</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Waktu</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($kegiatan as $k)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $k->judul }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $k->waktu_mulai }} s/d {{ $k->waktu_selesai }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $k->status ?? 'Pending' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-blue-400 text-gray-800">
                                        <a href="{{ route('kegiatan.show', $k->id) }}" class="btn btn-info btn-sm">Detail</a></span>

                                    @if(Auth::user()->role->value == 'admin')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-yellow-400 text-gray-800">
                                        <a href="{{ route('kegiatan.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a></span>
                                    <form action="{{ route('kegiatan.destroy', $k->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-red-700 text-gray-100">
                                            <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button></span>
                                    </form>
                                    @endif

                                    @if(Auth::user()->role->value == 'pembina' && $k->pembina_id == null)
                                    <form action="{{ route('kegiatan.approve.pembina', $k->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Setujui Pembina</button>
                                    </form>
                                    @endif

                                    @if(Auth::user()->role->value == 'koordinator' && $k->status != 'disetujui')
                                    <form action="{{ route('kegiatan.approve.koordinator', $k->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Setujui Koordinator</button>
                                    </form>
                                    @endif

                                    @if(Auth::user()->role->value == 'pelaksana')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800"><a href="{{ route('kegiatan.tim', $k->id) }}" class="btn btn-secondary btn-sm">Tambah Tim</a></span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
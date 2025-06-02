<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Observasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Form Observasi</h2>

                <form method="post" action="{{ route('observasi.update',$observasi->id) }}" class="space-y-5">
                    @csrf

                    <div>

                        <input type="hidden" name="observasi_id" value=" {{$observasi->id}}">
                        <input type="hidden" name="surveyor_id" value=" {{$observasi->surveyor_id}}">


                        <div>
                            <label for="tanggal_kunjungan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Kunjungan</label>
                            <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" value="{{$observasi->tanggal_kunjungan}}"
                                class=" mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div>
                            <label for="nama_tetangga" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Tetangga</label>
                            <input type="text" name="nama_tetangga" id="nama_tetangga" value="{{$observasi->nama_tetangga}}"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div>
                            <label for="alamat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white resize-none" required>{{$observasi->alamat}}</textarea>
                        </div>

                        <div>
                            <label for="kondisi_teramati" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kondisi Teramati</label>
                            <textarea name="kondisi_teramati" id="kondisi_teramati" rows="3"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white resize-none" required> {{$observasi->kondisi_teramati}}</textarea>
                        </div>

                        <div>
                            <label for="bentuk_interaksi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bentuk Interaksi</label>
                            <textarea name="bentuk_interaksi" id="bentuk_interaksi" rows="3" placeholder="Tuliskan bentuk interaksi yang dilakukan"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white resize-none" required>{{$observasi->bentuk_interaksi}}</textarea>
                        </div>

                        <div>
                            <label for="catatan_tambahan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Catatan Tambahan</label>
                            <textarea name="catatan_tambahan" id="catatan_tambahan" rows="3" placeholder="Catatan tambahan jika ada"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white resize-none">{{$observasi->catatan_tambahan}}</textarea>
                        </div>


                        <div>
                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all duration-200">
                                Ubah
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
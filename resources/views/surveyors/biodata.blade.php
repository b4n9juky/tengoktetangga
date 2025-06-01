<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Isi Biodata</h2>

                <form method="POST" action="{{ route('surveyors.biodata.store') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" placeholder="Nama Lengkap"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div>
                        <label for="kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kelas</label>
                        <input type="text" name="kelas" id="kelas" placeholder="Kelas"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                    </div>


                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">No HP</label>
                        <input type="text" name="no_hp" id="no_hp" placeholder="Nomor HP"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="4" placeholder="Tulis alamat lengkap kamu di sini..."
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white resize-none" required></textarea>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all duration-200">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
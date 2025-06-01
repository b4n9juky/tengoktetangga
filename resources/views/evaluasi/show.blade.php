<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evaluasi Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">

                @if(in_array(Auth::user()->role, ['pembina', 'koordinator']))
                <form action="{{ route('evaluasi.store', $kegiatan->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="isi_evaluasi" class="form-label">Evaluasi</label>
                        <textarea name="isi_evaluasi" id="isi_evaluasi" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Kirim Evaluasi</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
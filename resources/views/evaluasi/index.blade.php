<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evaluasi Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">

                <h5 class="mt-4">Daftar Evaluasi</h5>

                @forelse ($kegiatan->evaluasis as $evaluasi)
                <div class="card mb-2">
                    <div class="card-header">
                        {{ ucfirst($evaluasi->role) }} - {{ $evaluasi->user->name }}
                        <small class="text-muted float-end">{{ $evaluasi->created_at->format('d M Y H:i') }}</small>
                    </div>
                    <div class="card-body">
                        {{ $evaluasi->isi_evaluasi }}
                    </div>
                </div>
                @empty
                <p class="text-muted">Belum ada evaluasi.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kegiatan') }}
        </h2>
    </x-slot>
    <div class="container">
        <h2>Detail Kegiatan: {{ $kegiatan->judul }}</h2>
        <p>Waktu: {{ $kegiatan->waktu_pelaksanaan }}</p>
        <p>Lokasi: {{ $kegiatan->lokasi }}</p>
        <p>Status: {{ $kegiatan->status }}</p>

        <hr>

        {{-- Tombol hanya untuk pelaksana --}}
        @if(auth()->user()->role === 'pelaksana')
        <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-warning">Edit Usulan</a>
        @endif

        {{-- Tombol approve oleh pembina --}}
        @if(auth()->user()->role === 'pembina')
        <form action="{{ route('kegiatan.approve.pembina', $kegiatan->id) }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-primary">Ajukan ke Koordinator</button>
        </form>
        @endif

        {{-- Tombol approve oleh koordinator --}}
        @if(auth()->user()->role === 'koordinator')
        <form action="{{ route('kegiatan.approve.koordinator', $kegiatan->id) }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-success">Setujui Kegiatan</button>
        </form>
        @endif

        {{-- Hapus oleh admin --}}
        @if(auth()->user()->role === 'admin')
        <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Hapus</button>
        </form>
        @endif

        <hr>

        <a href="{{ route('kegiatan.home') }}" class="btn btn-secondary">Kembali</a>
    </div>
</x-app-layout>
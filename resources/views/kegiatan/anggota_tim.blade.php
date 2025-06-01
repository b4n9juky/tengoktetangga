@extends('layouts.app')

@section('content')
<h1>Tambah Anggota Tim untuk Tim: {{ $tim->nama_tim }}</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form action="{{ route('kegiatan.tim.anggota.store', $tim->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="user_id" class="form-label">Anggota Tim</label>
        <select name="user_id" class="form-select" required>
            <option value="">-- Pilih Anggota --</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role }})</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tugas" class="form-label">Tugas (opsional)</label>
        <textarea name="tugas" class="form-control">{{ old('tugas') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Tambah Anggota</button>
</form>
@endsection
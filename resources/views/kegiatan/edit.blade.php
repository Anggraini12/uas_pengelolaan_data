@extends('layouts.template')

@section('title', 'Edit Informasi Kegiatan')

@section('content')
<div class="container mt-3">
    <h3>Edit Kegiatan</h3>
    <form action="{{ route('kegiatan.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Tanggal Kegiatan</label>
            <input type="date" name="tanggal_kegiatan" class="form-control" value="{{ $data->tanggal_kegiatan }}" required>
        </div>
        <div class="mb-3">
            <label>Kegiatan</label>
            <textarea name="kegiatan" class="form-control" required>{{ $data->kegiatan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

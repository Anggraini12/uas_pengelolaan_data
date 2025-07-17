@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Tambah Data</div>

                <div class="card-body">
                    <form method="post" action="/kegiatan" enctype="multipart/form-data">
                        @csrf
                    <div class="mb-3">
                        <label>Tanggal Kegiatan</label>
                        <input type="date" name="tanggal_kegiatan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Kegiatan</label>
                        <textarea name="kegiatan" class="form-control" required></textarea>
                    </div>
                        
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- @extends('layouts.template')

@section('title', 'Tambah Informasi Kegiatan')

@section('content')
<div class="container mt-3">
    <h3>Tambah Kegiatan</h3>
    <form action="{{ route('kegiatan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tanggal Kegiatan</label>
            <input type="date" name="tanggal_kegiatan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kegiatan</label>
            <textarea name="kegiatan" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection --}}


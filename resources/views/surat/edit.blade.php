@extends('layouts.template')

@section('title', 'Edit Surat')
@section('headline', 'Edit Surat')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('surat.update', $data->kode_surat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Kode Surat</label>
                <input type="text" name="kode_surat" class="form-control" value="{{ $data->kode_surat }}" readonly>
            </div>
            <div class="mb-3">
                <label>Jenis Surat</label>
                <input type="text" name="jenis_surat" class="form-control" value="{{ $data->jenis_surat }}" required>
            </div>
            <div class="mb-3">
                <label>Pilih Penduduk (NIK)</label>
                <select name="nik" class="form-select" required>
                    @foreach ($penduduk as $item)
                        <option value="{{ $item->nik }}" {{ $item->nik == $data->nik ? 'selected' : '' }}>
                            {{ $item->nik }} - {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Ganti File Surat (PDF)</label>
                <input type="file" name="file_surat" class="form-control" accept="application/pdf">
                <small>Biarkan kosong jika tidak ingin mengubah file.</small>
            </div>
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('surat.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection

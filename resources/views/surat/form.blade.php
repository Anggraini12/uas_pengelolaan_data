@extends('layouts.template')

@section('title', 'Tambah Surat')
@section('headline', 'Tambah Surat')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Form Tambah Surat</h5>
    </div>
    <div class="card-body">

        {{-- Tampilkan pesan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Tambah Surat --}}
        <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="kode_surat" class="form-label">Kode Surat <span class="text-danger">*</span></label>
                <input type="text" name="kode_surat" id="kode_surat" class="form-control @error('kode_surat') is-invalid @enderror"
                    value="{{ old('kode_surat') }}" placeholder="Contoh: SRT-001" required>
                @error('kode_surat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_surat" class="form-label">Jenis Surat <span class="text-danger">*</span></label>
                <input type="text" name="jenis_surat" id="jenis_surat" class="form-control @error('jenis_surat') is-invalid @enderror"
                    value="{{ old('jenis_surat') }}" placeholder="Contoh: Surat Domisili" required>
                @error('jenis_surat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nik" class="form-label">Penduduk (NIK) <span class="text-danger">*</span></label>
                <select name="nik" id="nik" class="form-select @error('nik') is-invalid @enderror" required>
                    <option value="">-- Pilih Penduduk --</option>
                    @foreach ($penduduk as $p)
                        <option value="{{ $p->nik }}" {{ old('nik') == $p->nik ? 'selected' : '' }}>
                            {{ $p->nik }} - {{ $p->nama }}
                        </option>
                    @endforeach
                </select>
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file_surat" class="form-label">Upload Foto Surat (jpg/png/jpeg) <span class="text-danger">*</span></label>
                <input type="file" name="file_surat" id="file_surat" class="form-control @error('file_surat') is-invalid @enderror"
                    accept=".jpg,.jpeg,.png" required>
                @error('file_surat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Ukuran maksimal: 2MB</small>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('surat.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

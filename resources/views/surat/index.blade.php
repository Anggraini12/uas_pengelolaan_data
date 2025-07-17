@extends('layouts.template')

@section('title')
    Pembuatan Surat
@endsection

@section('headline')
    Pembuatan Surat
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Data Surat</h3>
        <a href="/surat/create" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Tambah Surat
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-light text-center">
                <tr>
                    <th>No</th>
                    <th>Kode Surat</th>
                    <th>Jenis Surat</th>
                    <th>Nama Penduduk</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_surat }}</td>
                    <td>{{ $item->jenis_surat }}</td>
                    <td>{{ $item->penduduk->nama ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ asset('storage/' . $item->file_surat) }}" target="_blank" class="btn btn-outline-info btn-sm">
                            <i class="fa fa-file"></i> Lihat
                        </a>
                    </td>
                    <td class="text-center">
                        <!-- Detail -->
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->kode_surat }}">
                            <i class="fa fa-info"></i>
                        </button>

                        <!-- Edit -->
                        <a href="/surat/{{ $item->kode_surat }}/edit" class="btn btn-info btn-sm">
                            <i class="fa fa-pen"></i>
                        </a>

                        <!-- Delete -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->kode_surat }}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Tidak ada data surat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Detail & Delete -->
@foreach ($data as $item)
<!-- Modal Detail -->
<div class="modal fade" id="detailModal{{ $item->kode_surat }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->kode_surat }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Surat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <tr>
                        <td><strong>Kode Surat</strong></td>
                        <td>: {{ $item->kode_surat }}</td>
                    </tr>
                    <tr>
                        <td><strong>Jenis Surat</strong></td>
                        <td>: {{ $item->jenis_surat }}</td>
                    </tr>
                    <tr>
                        <td><strong>NIK</strong></td>
                        <td>: {{ $item->nik }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td>: {{ $item->penduduk->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>File</strong></td>
                        <td>: <a href="{{ asset('storage/' . $item->file_surat) }}" target="_blank">Lihat File</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal{{ $item->kode_surat }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->kode_surat }}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/surat/{{ $item->kode_surat }}" method="POST" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus surat "<strong>{{ $item->kode_surat }}</strong>" dari penduduk <strong>{{ $item->penduduk->nama ?? 'N/A' }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection

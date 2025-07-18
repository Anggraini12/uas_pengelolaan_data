@extends('layouts.template')

@section('title', 'Kegiatan')
@section('headline', 'Kegiatan')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Informasi Kegiatan</h3>
        <a href="/kegiatan/create" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Tambah Data
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Nama Kegiatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_kegiatan }}</td>
                    <td>{{ $item->kegiatan }}</td>
                    <td>
                        <!-- Tombol Detail -->
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                            <i class="fa fa-info"></i>
                        </button>

                        <!-- Tombol Edit -->
                        <a href="/kegiatan/edit/{{ $item->id }}" class="btn btn-info btn-sm">
                            <i class="fa fa-pen"></i>
                        </a>

                        <!-- Tombol Delete -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data kegiatan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Detail & Delete (DI LUAR TABEL) -->
@foreach ($data as $item)
<!-- Modal Detail -->
<div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <tr>
                        <td><strong>Tanggal Kegiatan</strong></td>
                        <td>: {{ $item->tanggal_kegiatan }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama Kegiatan</strong></td>
                        <td>: {{ $item->kegiatan }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/kegiatan/{{ $item->id }}" method="POST" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus kegiatan "<strong>{{ $item->kegiatan }}</strong>"?
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

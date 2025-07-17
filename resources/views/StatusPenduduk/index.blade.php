@extends('layouts.template')

@section('title')
    Status Penduduk
@endsection

@section('headline')
    Status Penduduk
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Data Status Penduduk</h3>
        <a href="/statuspenduduk/tambah" class="btn btn-primary btn-sm">
            <i class="fa fa-user-plus"></i> Tambah Data
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Status</th>
                        <th>Jenis Kelamin</th>
                        <th>Gol Darah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $nomor = 1; @endphp
                    @forelse($statuspenduduk as $data)
                        <tr class="text-center">
                            <td>{{ $nomor++ }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->tempat_lahir }}</td>
                            <td>{{ $data->tgl_lahir }}</td>
                            <td>{{ $data->status }}</td>
                            <td>{{ $data->jk }}</td>
                            <td>{{ $data->gol }}</td>
                            <td class="d-flex justify-content-center gap-1">
                                <!-- Tombol Detail -->
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $data->nik }}">
                                    <i class="fa fa-info"></i>
                                </button>

                                <!-- Tombol Edit -->
                                <a href="/statuspenduduk/edit/{{ $data->nik }}" class="btn btn-info btn-sm" title="Edit">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <!-- Tombol Delete -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $data->nik }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted">Data Tidak Ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Detail & Hapus (di luar tabel) -->
@foreach($statuspenduduk as $data)
<!-- Modal Detail -->
<div class="modal fade" id="modalDetail{{ $data->nik }}" tabindex="-1" aria-labelledby="modalDetailLabel{{ $data->nik }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Penduduk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>NIK</th>
                        <td>{{ $data->nik }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $data->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $data->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $data->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $data->status }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $data->jk }}</td>
                    </tr>
                    <tr>
                        <th>Golongan Darah</th>
                        <td>{{ $data->gol }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete{{ $data->nik }}" tabindex="-1" aria-labelledby="modalDeleteLabel{{ $data->nik }}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/statuspenduduk/{{ $data->nik }}" method="POST" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus data penduduk <strong>{{ $data->nama }}</strong>?
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

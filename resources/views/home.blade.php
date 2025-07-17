@extends('layouts.template')

@section('title', 'Dashboard')
@section('headline', 'Dashboard')

@section('content')
<div class="row">
    <!-- Selamat Datang -->
    <div class="col-12">
        <div class="alert alert-success shadow-sm">
            <h4 class="mb-1">Selamat Datang di Sistem Informasi Kantor Desa!</h4>
            <p class="mb-0">Semoga harimu menyenangkan. Silakan kelola data penduduk, kegiatan, dan surat dengan mudah melalui dashboard ini.</p>
        </div>
    </div>

    <!-- Kartu Statistik -->
    <div class="col-md-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <i class="fa fa-users fa-2x text-primary"></i>
                </div>
                <div>
                    <div class="text-xs fw-bold text-primary text-uppercase mb-1">Status Penduduk</div>
                    <div class="h5 mb-0 fw-bold"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <i class="fa fa-calendar fa-2x text-success"></i>
                </div>
                <div>
                    <div class="text-xs fw-bold text-success text-uppercase mb-1">Informasi Kegiatan</div>
                    <div class="h5 mb-0 fw-bold"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <i class="fa fa-envelope fa-2x text-warning"></i>
                </div>
                <div>
                    <div class="text-xs fw-bold text-warning text-uppercase mb-1">Surat Diajukan</div>
                    <div class="h5 mb-0 fw-bold"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahan Info -->
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="card-title mb-0">Informasi Umum</h5>
            </div>
            <div class="card-body">
                <p>Sistem ini dibuat untuk membantu pengelolaan administrasi dan layanan masyarakat di Kantor Desa.</p>
                <ul>
                    <li>Kelola Data Status Penduduk</li>
                    <li>Catat dan Publikasikan Kegiatan Desa</li>
                    <li>Proses Permohonan Surat dengan Cepat</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

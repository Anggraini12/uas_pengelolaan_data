<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\statuspendudukController;
use App\Http\Controllers\InformasiKegiatanController;
use App\Http\Controllers\PembuatanSuratController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/cektemplate', function () {
    return view('layouts.template');
});

 Route::get('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');

// Route::resource('/penduduk', StatusPendudukController::class);
// Route::resource('/kegiatan', InformasiKegiatanController::class);
// Route::resource('/surat', PembuatanSuratController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Data Status
Route::get('/statuspenduduk', [statuspendudukController::class, 'index'])->name('statuspenduduk.index');
Route::get('/statuspenduduk/tambah', [statuspendudukController::class, 'create'])->name('statuspenduduk.create');
Route::post('/statuspenduduk', [statuspendudukController::class, 'store'])->name('statuspenduduk.store');
Route::get('/statuspenduduk/edit/{nik}', [statuspendudukController::class, 'edit'])->name('statuspenduduk.edit');
Route::put('/statuspenduduk/{nik}', [statuspendudukController::class, 'update'])->name('statuspenduduk.update');
Route::delete('/statuspenduduk/{nik}', [statuspendudukController::class, 'destroy']);

// Informasi Kegiatan
Route::prefix('kegiatan')->name('kegiatan.')->group(function () {
    Route::get('/', [InformasiKegiatanController::class, 'index'])->name('index');
    Route::get('/create', [InformasiKegiatanController::class, 'create'])->name('create');
    Route::post('/', [InformasiKegiatanController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [InformasiKegiatanController::class, 'edit'])->name('edit');
    Route::put('/{id}', [InformasiKegiatanController::class, 'update'])->name('update');
    Route::delete('/{id}', [InformasiKegiatanController::class, 'destroy'])->name('destroy');
});

// Pembuatan Surat - DILUAR PREFIX!
Route::get('/surat', [PembuatanSuratController::class, 'index'])->name('surat.index');
Route::get('/surat/create', [PembuatanSuratController::class, 'create'])->name('surat.create');
Route::post('/surat', [PembuatanSuratController::class, 'store'])->name('surat.store');
Route::get('/surat/{kode_surat}/edit', [PembuatanSuratController::class, 'edit'])->name('surat.edit');
Route::put('/surat/{kode_surat}', [PembuatanSuratController::class, 'update'])->name('surat.update');
Route::delete('/surat/{kode_surat}', [PembuatanSuratController::class, 'destroy'])->name('surat.destroy');

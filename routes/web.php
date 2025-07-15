<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\statuspendudukController;

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
// Route::get('/statuspenduduk', [statuspendudukController::class, 'index']);
Route::get('/statuspenduduk/tambah', [statuspendudukController::class, 'create']);
Route::post('/statuspenduduk', [statuspendudukController::class, 'store']);
Route::get('/statuspenduduk/edit/{id}', [statuspendudukController::class, 'edit']);
Route::put('/statuspenduduk/{id}', [statuspendudukController::class, 'update']);
Route::delete('/statuspenduduk/{id}', [statuspendudukController::class, 'destroy']);

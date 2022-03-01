<?php

use App\Http\Controllers\produkController;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\FronendController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/', function () {
//     return view('beranda');
// });\
Route::resource('/', FronendController::class);

// Route::get('/', function () {
//     return view('layouts.frontend');
// });
// Route::post('pesan/{id}', [PesanController::class, 'pesan']);

// Route::get('check-out', [PesanController::class, 'check_out']);
// Route::get('pesan/{id}', [PesanController::class, 'index']);

// Route::delete('check-out/{id}', [PesanController::class, 'delete']);

// Route::get('konfirmasi-check-out', [PesanController::class, 'konfirmasi']);


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {

    Route::resource('produk', produkController::class)->middleware('role:admin');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::resource('pengelola', BarangController::class)->middleware('role:admin');
    Route::resource('pesanan', PesananController::class)->middleware('role:admin');
    Route::resource('transaksi', PembayaranController::class)->middleware('role:admin');
    Route::resource('laporan', LaporanController::class)->middleware('role:admin');
    Route::resource('kategori', kategoriController::class)->middleware('role:admin');

    Route::get('cetak-laporan', [ReportController::class, 'laporan'])->name('getLaporan');
    Route::post('cetak-laporan', [ReportController::class, 'cetaklaporan'])->name('laporan');

});


Route::get('test', [PesananController::class, 'test']);
Route::resource('adminltr/produk', produkController::class);

<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('register', [App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::post('register', [App\Http\Controllers\RegisterController::class, 'register'])->name('register');

Auth::routes(['register' => false,'login' => false]);

Route::middleware(['role:Admin,Pimpinan,Dokter'])->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class,'index']);
    Route::resource('dokter', App\Http\Controllers\DokterController::class);
    Route::post('dokter/harikerja/{id}', [App\Http\Controllers\DokterController::class,"harikerja"]);
    Route::resource('pasien', App\Http\Controllers\PasienController::class);
    Route::resource('pasiendokter', App\Http\Controllers\PasienDokterController::class);
    Route::resource('penanganan', App\Http\Controllers\PenangananController::class);
    Route::resource('produk', App\Http\Controllers\ProdukController::class);
    Route::post('transaksi', [App\Http\Controllers\TransaksiController::class,'store']);

});

Route::middleware(['role:Admin,Pimpinan'])->group(function () {
    Route::get('laporan', [App\Http\Controllers\LaporanController::class,'index']);

});




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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\DashboardController::class,'index']);
Route::get('laporan', [App\Http\Controllers\LaporanController::class,'index']);
Route::get('dokter', [App\Http\Controllers\DokterController::class,'index']);
Route::resource('pasien', App\Http\Controllers\PasienController::class);
Route::resource('penanganan', App\Http\Controllers\PenangananController::class);
Route::resource('produk', App\Http\Controllers\ProdukController::class);


Route::post('transaksi', [App\Http\Controllers\TransaksiController::class,'store']);
Route::post('lunasi/{id}', [App\Http\Controllers\TransaksiController::class,'lunasi']);

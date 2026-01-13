<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware(['auth']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/admin', function () {
    return redirect('/dashboard');
});

Route::get('/kasir', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('kategori', KategoriController::class);
});

use App\Http\Controllers\ProdukController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('produk', ProdukController::class);
});

use App\Http\Controllers\TransaksiController;

Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::resource('transaksi', TransaksiController::class);
});

use App\Http\Controllers\LaporanPenjualanController;

Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/laporan/penjualan', [LaporanPenjualanController::class, 'index'])
        ->name('laporan.penjualan');
});

use App\Http\Controllers\PembelianController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('pembelian', PembelianController::class);
});

Route::get('/laporan/pembelian', [PembelianController::class, 'laporan'])
    ->name('laporan.pembelian')
    ->middleware(['auth', 'role:admin']);






require __DIR__.'/auth.php';

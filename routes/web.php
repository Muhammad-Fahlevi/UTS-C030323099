<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\PembayaranController;

Route::get('/profils/create', [ProfilController::class, 'create'])->name('profils.create');
Route::post('/profils', [ProfilController::class, 'store'])->name('profils.store');
Route::get('/profils', [ProfilController::class, 'index'])->name('index');
Route::put('/profils/{id}', [ProfilController::class, 'update'])->name('profils.update');
Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::post('/penyewaan', [PenyewaanController::class, 'store'])->name('penyewaan.store');
Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
Route::get('/', function () {
    return view('index');

});


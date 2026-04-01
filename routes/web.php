<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin']);
Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/anggota/dashboard', function () {
    return view('anggota.dashboard');
})->name('anggota.dashboard');

Route::get('/anggota/buku', function () {
    return view('anggota.buku');
})->name('anggota.buku');

Route::get('/anggota/pinjam', function () {
    return view('anggota.pinjam');
})->name('anggota.pinjam');

Route::get('/anggota/riwayat', function () {
    return view('anggota.riwayat');
})->name('anggota.riwayat');



Route::middleware(['auth'])->group(function () {

    Route::get('/anggota/buku', [BukuController::class, 'index'])->name('anggota.buku');

    Route::get('/anggota/buku/{id}', [BukuController::class, 'detail'])->name('anggota.detail');

    Route::get('/anggota/pinjam/{id}', [BukuController::class, 'pinjam'])->name('anggota.pinjam');

    Route::post('/anggota/pinjam/{id}', [BukuController::class, 'store'])->name('anggota.pinjam.store');

});


Route::get('/anggota', function () {
    return view('anggota.dashboard');
})->middleware('role:anggota');

Route::get('/petugas', function () {
    return view('petugas.dashboard');
})->middleware('role:petugas');

Route::get('/kepala', function () {
    return view('kepala.dashboard');
})->middleware('role:kepala');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/', function () {
    return view('welcome');
});

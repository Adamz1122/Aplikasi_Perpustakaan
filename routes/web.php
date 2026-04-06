<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/anggota', function () {
    return view('anggota.dashboard');
})->middleware('role:anggota');

Route::get('/petugas', function () {
    return view('petugas.dashboard');
})->middleware('auth','role:petugas')->name('petugas.dashboard');

Route::get('/kepala', function () {
    return view('kepala.dashboard');
})->middleware('auth','role:kepala');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/login', function(){
return view('auth.login');
})->name('login');

Route::post('/login',[AuthController::class,'login']);

Route::get('/register', function(){
return view('auth.register');
});

Route::post('/register',[AuthController::class,'register']);

Route::get('/logout',[AuthController::class,'logout']);

Route::get('/anggota/dashboard', function () {
    return view('anggota.dashboard');
})->name('anggota.dashboard');


Route::get('/anggota/riwayat', function () {
    return view('anggota.riwayat');
})->name('anggota.riwayat');


Route::get('/pinjam/{id}', [PeminjamanController::class,'pinjam'])->name('anggota.pinjam');

Route::post('/pinjam/{id}', [PeminjamanController::class,'store'])->name('anggota.pinjam.store');

Route::middleware(['auth'])->group(function () {

Route::get('/anggota/buku', [BukuController::class, 'anggota'])->name('anggota.buku');

Route::get('/anggota/buku/{id}', [BukuController::class, 'detail'])->name('anggota.detail-buku');

Route::get('/anggota/pinjam/{id}', [BukuController::class, 'pinjam'])->name('anggota.pinjam');

Route::post('/anggota/pinjam/{id}', [BukuController::class, 'store'])->name('anggota.pinjam.store');

Route::get('/anggota/peminjaman', [PeminjamanController::class,'index'])
->name('anggota.peminjaman');

Route::get('/anggota/kembali/{id}', [PeminjamanController::class,'kembali'])
->name('anggota.kembali');

Route::get('/anggota/riwayat',[PeminjamanController::class,'riwayat'])
->name('anggota.riwayat');

Route::get('/anggota/riwayat/hapus/{id}',
[PeminjamanController::class,'hapusRiwayat'])
->name('anggota.riwayat.hapus');

});


Route::middleware(['auth','role:petugas'])->group(function(){

Route::get('/petugas/buku',[BukuController::class,'index'])->name('petugas.buku');

Route::get('/petugas/buku/create',[BukuController::class,'create'])->name('petugas.create');

Route::post('/petugas/buku/store',[BukuController::class,'storeBuku'])->name('petugas.store');

Route::get('/petugas/buku/edit/{id}',[BukuController::class,'edit'])->name('petugas.edit');

Route::post('/petugas/buku/update/{id}',[BukuController::class,'update'])->name('petugas.update');

Route::get('/petugas/buku/delete/{id}',[BukuController::class,'destroy'])->name('petugas.delete');

});

Route::middleware(['auth','role:petugas'])->group(function(){

Route::get('/petugas/dashboard', function () {
    return view('petugas.dashboard');
})->name('petugas.dashboard');

Route::get('/petugas/buku/index', function () {
    return view('petugas.buku.index');
})->name('petugas.buku');

Route::get('/petugas/anggota', function () {
    return view('petugas.anggota');
})->name('petugas.anggota');

Route::get('/petugas/riwayat', function () {
    return view('petugas.riwayat');
})->name('petugas.riwayat');

Route::get('/petugas/peminjaman', function () {
    return view('petugas.peminjaman');
})->name('petugas.peminjaman');

Route::get('/petugas/pengembalian', function () {
    return view('petugas.pengembalian');
})->name('petugas.pengembalian');
});

Route::middleware(['auth','role:kepala'])->group(function(){

Route::get('/dashboard', function(){
    return view('kepala.dashboard');
})->name('kepala.dashboard');

Route::get('/petugas', function(){
    return view('kepala.petugas');
})->name('kepala.petugas');

Route::get('/peminjaman', function(){
    return view('kepala.peminjaman');
})->name('kepala.peminjaman');

Route::get('/laporan', function(){
    return view('kepala.laporan');
})->name('kepala.laporan');

});

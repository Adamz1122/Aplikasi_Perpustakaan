<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KepalaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});


// ==============================
// AUTH
// ==============================

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// ==============================
// ANGGOTA
// ==============================

Route::middleware(['auth', 'role:anggota'])->prefix('anggota')->group(function () {

    Route::get('/dashboard', [AnggotaController::class, 'dashboard'])->name('anggota.dashboard');

    Route::get('/buku', [AnggotaController::class, 'buku'])->name('anggota.buku');

    Route::get('/detail/{id}', [AnggotaController::class, 'detail'])->name('anggota.detail-buku');

    // =====================
    // PEMINJAMAN
    // =====================
    Route::get('/pinjam/{id}', [PeminjamanController::class, 'pinjam'])->name('anggota.pinjam');

    Route::post('/pinjam', [PeminjamanController::class, 'store'])->name('anggota.pinjam.store');

    // ✅ GANTI index → peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'peminjaman'])->name('anggota.peminjaman');

    // ✅ GANTI kembali → ajukanKembali
    Route::get('/kembali/{id}', [PeminjamanController::class, 'ajukanKembali'])->name('anggota.kembali');

    // =====================
    // RIWAYAT
    // =====================
    Route::get('/riwayat', [PeminjamanController::class, 'riwayat'])->name('anggota.riwayat');

    Route::delete('/riwayat/{id}', [PeminjamanController::class, 'hapusRiwayat'])->name('anggota.riwayat.hapus');

});

// ==============================
// PETUGAS
// ==============================

Route::prefix('petugas')->middleware(['auth', 'role:petugas'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [PetugasController::class, 'dashboard'])->name('petugas.dashboard');

    // Buku CRUD
    Route::get('/buku', [PetugasController::class, 'buku'])->name('petugas.buku');

    Route::get('/buku/create', [PetugasController::class, 'createBuku'])->name('petugas.buku.create');

    Route::post('/buku/store', [PetugasController::class, 'storeBuku'])->name('petugas.buku.store');

    Route::get('/buku/edit/{id}', [PetugasController::class, 'editBuku'])->name('petugas.buku.edit');

    Route::post('/buku/update/{id}', [PetugasController::class, 'updateBuku'])->name('petugas.buku.update');

    Route::get('/buku/delete/{id}', [PetugasController::class, 'deleteBuku'])->name('petugas.buku.delete');

    // CRUD Anggota
    Route::get('/anggota', [PetugasController::class, 'anggota'])->name('petugas.anggota');

    Route::get('/anggota/create', [PetugasController::class, 'createAnggota'])->name('petugas.anggota.create');

    Route::post('/anggota/store', [PetugasController::class, 'storeAnggota'])->name('petugas.anggota.store');

    Route::get('/anggota/edit/{id}', [PetugasController::class, 'editAnggota'])->name('petugas.anggota.edit');

    Route::post('/anggota/update/{id}', [PetugasController::class, 'updateAnggota'])->name('petugas.anggota.update');

    Route::get('/anggota/delete/{id}', [PetugasController::class, 'deleteAnggota'])->name('petugas.anggota.delete');


    // AKTIVITAS PETUGAS
    Route::get('/aktivitas', [PetugasController::class, 'aktivitas'])->name('petugas.aktivitas');

    Route::get('/peminjaman/terima/{id}', [PetugasController::class, 'terimaPinjam'])->name('petugas.terima.pinjam');

    Route::get('/peminjaman/tolak/{id}', [PetugasController::class, 'tolakPinjam'])->name('petugas.tolak.pinjam');

    Route::get('/pengembalian/konfirmasi/{id}', [PetugasController::class, 'konfirmasiKembali'])->name('petugas.konfirmasi.kembali');


    // Riwayat
    Route::get('/riwayat', [PetugasController::class, 'riwayat'])->name('petugas.riwayat');

});



// ==============================
// KEPALA
// ==============================

Route::prefix('kepala')->middleware(['auth', 'role:kepala'])->group(function () {

    Route::get('/dashboard', [KepalaController::class, 'dashboard'])->name('kepala.dashboard');


    // Petugas CRUD
    Route::get('/petugas', [KepalaController::class, 'petugas'])->name('kepala.petugas');

    Route::get('/petugas/create', [KepalaController::class, 'createPetugas'])->name('kepala.petugas.create');

    Route::post('/petugas/store', [KepalaController::class, 'storePetugas'])->name('kepala.petugas.store');

    Route::get('/petugas/edit/{id}', [KepalaController::class, 'editPetugas'])->name('kepala.petugas.edit');

    Route::post('/petugas/update/{id}', [KepalaController::class, 'updatePetugas'])->name('kepala.petugas.update');

    Route::get('/petugas/delete/{id}', [KepalaController::class, 'deletePetugas'])->name('kepala.petugas.delete');


    // Peminjaman
    Route::get('/peminjaman', [KepalaController::class, 'peminjaman'])->name('kepala.peminjaman');


    // Laporan
    Route::get('/laporan', [KepalaController::class, 'laporan'])->name('kepala.laporan');

    Route::get('/laporan/pdf', [KepalaController::class, 'laporanPdf'])->name('kepala.laporan.pdf');

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

});

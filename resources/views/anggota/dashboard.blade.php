@extends('layouts.app')

@section('title', 'Dashboard Anggota')

@section('content')
    <h2>Selamat Datang, {{ auth()->user()->name }} 👋</h2>

    <!-- CARDS INFO -->
    <div class="cards">
        <div class="card">
            <h3>Jumlah Buku</h3>
            <p>7</p>
        </div>
        <div class="card">
            <h3>Riwayat</h3>
            <p>1</p>
        </div>
        <div class="card">
            <h3>Peminjaman Saat Ini</h3>
            <p>2</p>
        </div>
    </div>

    <!-- INFO BOX -->
    <div class="info-box">
        <h4>Informasi Aturan Peminjaman</h4>
        <ol>
            <li>Waktu maksimal peminjaman 1 minggu</li>
            <li>Setiap anggota hanya dapat meminjam maksimal 3 buku</li>
            <li>Jika terlambat mengembalikan buku, akan dikenakan denda</li>
        </ol>
    </div>
@endsection
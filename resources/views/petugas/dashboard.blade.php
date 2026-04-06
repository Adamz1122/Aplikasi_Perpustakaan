@extends('layouts.petugas')

@section('title','Dashboard Petugas')

@section('content')

<h3>Selamat Datang, {{ auth()->user()->name }}</h3>

<div class="cards">

<div class="card card-blue">
Jumlah Buku
<h2>7</h2>
</div>

<div class="card card-green">
Kategori
<h2>5</h2>
</div>

<div class="card card-orange">
Anggota Saat Ini
<h2>2</h2>
</div>

</div>

<div class="table-box">

<h3>Data Peminjaman</h3>

<table>

<tr>
<th>No</th>
<th>Nama Anggota</th>
<th>Judul Buku</th>
<th>Tgl Kembali</th>
<th>Status</th>
<th>Denda</th>
</tr>

<tr>
<td>1</td>
<td>Asep</td>
<td>Matematika Kalas 10</td>
<td>27-03-2026</td>
<td>Terlambat</td>
<td>5000</td>
</tr>

</table>

</div>

@endsection

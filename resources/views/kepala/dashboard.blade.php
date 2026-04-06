@extends('layouts.kepala')

@section('title','Dashboard Kepala')

@section('content')

<div class="cards">

<div class="card card-blue">
Total Petugas
<h2>5</h2>
</div>

<div class="card card-green">
Total Peminjaman
<h2>20</h2>
</div>

<div class="card card-orange">
Total Buku
<h2>50</h2>
</div>

</div>

<div class="table-box">
<h3>Peminjaman Terbaru</h3>

<table>
<tr>
<th>Nama</th>
<th>Buku</th>
<th>Tanggal</th>
<th>Status</th>
</tr>

<tr>
<td>Ahmad</td>
<td>Laravel Dasar</td>
<td>10-04-2026</td>
<td>Dipinjam</td>
</tr>

</table>

</div>

@endsection

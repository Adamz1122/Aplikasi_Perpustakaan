@extends('layouts.kepala')

@section('title','Dashboard Kepala')

@section('content')

<div class="cards">

<div class="card card-blue">
Total Petugas
<h2>{{ $total_petugas }}</h2>
</div>

<div class="card card-green">
Total Peminjaman
<h2>{{ $total_peminjaman }}</h2>
</div>

<div class="card card-orange">
Total Buku
<h2>{{ $total_buku }}</h2>
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

@foreach($peminjaman as $p)
<tr>
<td>{{ $p->user->name ?? '-' }}</td>
<td>{{ $p->buku->judul ?? '-' }}</td>
<td>{{ $p->tanggal_pinjam }}</td>
<td>{{ $p->status }}</td>
</tr>
@endforeach

</table>

</div>

@endsection

@extends('layouts.kepala')

@section('title','Laporan Peminjaman')

@section('content')

<style>

@media print {

.sidebar,
.topbar,
button,
form{
display:none;
}

body{
background:white;
}

.table-box{
box-shadow:none;
}

}

</style>

<div class="table-box">

<h3>Laporan Peminjaman</h3>

<!-- FILTER -->
<form method="GET" style="margin-bottom:20px;">

Dari :
<input type="date" name="dari">

Sampai :
<input type="date" name="sampai">

<button>Cari</button>

<button onclick="window.print()" type="button">
Cetak
</button>

<a href="{{ route('kepala.laporan.pdf') }}">
Export PDF
</a>

</form>

<table>

<tr>
<th>No</th>
<th>Nama</th>
<th>Buku</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Status</th>
<th>Denda</th>
</tr>

@foreach($peminjaman as $p)

<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $p->user->name ?? '-' }}</td>
<td>{{ $p->buku->judul ?? '-' }}</td>
<td>{{ $p->tanggal_pinjam }}</td>
<td>{{ $p->tanggal_kembali ?? '-' }}</td>
<td>{{ $p->status }}</td>
<td>
Rp {{ number_format($p->denda ?? 0,0,',','.') }}
</td>
</tr>

@endforeach

</table>

</div>

@endsection

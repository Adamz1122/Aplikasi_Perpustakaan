@extends('layouts.petugas')

@section('title','Riwayat')

@section('content')

<div class="table-box">

<h3>Riwayat Peminjaman</h3>

<table>

<tr>
<th>No</th>
<th>Nama</th>
<th>Judul</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Jumlah</th>
<th>Status</th>
</tr>

@foreach($peminjaman as $p)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $p->user->name ?? '-' }}</td>

<td>{{ $p->buku->judul ?? '-' }}</td>

<td>{{ $p->tanggal_pinjam }}</td>

<td>{{ $p->tanggal_kembali }}</td>

<td>{{ $p->jumlah }}</td>

<td>{{ $p->status }}</td>

</tr>

@endforeach

</table>

</div>

@endsection

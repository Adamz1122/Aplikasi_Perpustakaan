@extends('layouts.petugas')

@section('title','Aktivitas')

@section('content')

<div class="table-box">

<h3>Aktivitas Peminjaman</h3>

<table>

<tr>
<th>No</th>
<th>Nama</th>
<th>Judul</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Jumlah</th>
<th>Status</th>
<th>Aksi</th>
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

<td>

<a href="{{ route('petugas.terima.pinjam',$p->id) }}">
Terima
</a>

|

<a href="{{ route('petugas.tolak.pinjam',$p->id) }}">
Tolak
</a>

</td>

</tr>

@endforeach

</table>

</div>


<br><br>


<div class="table-box">

<h3>Aktivitas Pengembalian</h3>

<table>

<tr>
<th>No</th>
<th>Nama</th>
<th>Judul</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Jumlah</th>
<th>Status</th>
<th>Aksi</th>
</tr>

@foreach($pengembalian as $p)

<tr>

<td>{{ $loop->iteration }}</td>
<td>{{ $p->user->name ?? '-' }}</td>
<td>{{ $p->buku->judul ?? '-' }}</td>
<td>{{ $p->tanggal_pinjam }}</td>
<td>{{ $p->tanggal_kembali }}</td>
<td>{{ $p->jumlah }}</td>
<td>{{ $p->status }}</td>

<td>

<a href="{{ route('petugas.konfirmasi.kembali',$p->id) }}">
Konfirmasi
</a>

</td>

</tr>

@endforeach

</table>

</div>

@endsection

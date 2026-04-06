@extends('layouts.app')

@section('title','Buku Dipinjam')

@section('content')

<h2>Buku Yang Dipinjam</h2>

<table border="1" cellpadding="10" cellspacing="0">
<tr>
<th>No</th>
<th>Judul Buku</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Jumlah</th>
<th>Status</th>
<th>Aksi</th> <!-- TAMBAHKAN DI SINI -->
</tr>

@foreach($peminjaman as $item)

<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $item->buku->judul }}</td>
<td>{{ $item->tanggal_pinjam }}</td>
<td>{{ $item->tanggal_kembali }}</td>
<td>{{ $item->jumlah }}</td>
<td>{{ $item->status }}</td>

<td> <!-- TAMBAHKAN DI SINI -->
@if($item->status == 'dipinjam')
<a href="{{ route('anggota.kembali',$item->id) }}">
<button>Kembalikan</button>
</a>
@endif
</td>

</tr>

@endforeach

</table>

@endsection

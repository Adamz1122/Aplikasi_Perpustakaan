@extends('layouts.anggota')

@section('title','Riwayat Peminjaman')

@section('content')

<h2>Riwayat Peminjaman</h2>

<table border="1" cellpadding="10">

<tr>
<th>No</th>
<th>Judul</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Denda</th>
<th>Aksi</th>
</tr>

@foreach($riwayat as $item)

<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $item->buku->judul }}</td>
<td>{{ $item->tanggal_pinjam }}</td>
<td>{{ $item->tanggal_kembali }}</td>
<td>Rp {{ $item->denda ?? 0 }}</td>

<td>
<a href="{{ route('anggota.riwayat.hapus',$item->id) }}">
<button>Hapus</button>
</a>
</td>

</tr>

@endforeach

</table>

@endsection

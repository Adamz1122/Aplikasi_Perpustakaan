@extends('layouts.petugas')

@section('title','Data Buku')

@section('content')

<a href="{{ route('petugas.buku.create') }}"
style="background:#7b4b2a;color:white;padding:10px 15px;border-radius:8px;text-decoration:none;">
+ Tambah Buku
</a>

<br><br>

<div class="table-box">

<table border="1" cellpadding="10" cellspacing="0" width="100%">

<tr>
<th>No</th>
<th>Judul</th>
<th>Pengarang</th>
<th>Penerbit</th>
<th>Kategori</th>
<th>Tahun</th>
<th>Stok</th>
<th>Gambar</th>
<th>Aksi</th>
</tr>

@foreach($buku as $item)

<tr>

<td>{{ $loop->iteration }}</td>
<td>{{ $item->judul }}</td>
<td>{{ $item->pengarang }}</td>
<td>{{ $item->penerbit }}</td>
<td>{{ $item->kategori }}</td>
<td>{{ $item->tahun_terbit }}</td>
<td>{{ $item->stok }}</td>

<td>
@if($item->gambar)
<img src="{{ asset('storage/'.$item->gambar) }}" width="70">
@endif
</td>

<td>
<a href="{{ route('petugas.buku.edit',$item->id) }}"
style="background:orange;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;">
Edit
</a>

<a href="{{ route('petugas.buku.delete',$item->id) }}"
style="background:red;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;"
onclick="return confirm('Yakin hapus buku?')">
Hapus
</a>

</td>

</tr>

@endforeach

</table>

</div>

@endsection

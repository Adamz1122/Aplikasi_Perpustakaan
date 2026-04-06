@extends('layouts.petugas')

@section('title','Data Buku')

@section('content')

<a href="{{ route('petugas.tambah') }}"
style="background:#7b4b2a;color:white;padding:10px;border-radius:8px;text-decoration:none;">
+ Tambah Buku
</a>

<br><br>

<table border="1" width="100%" cellpadding="10">

<tr>
<th>No</th>
<th>Judul</th>
<th>Pengarang</th>
<th>Penerbit</th>
<th>Kategori</th>
<th>Stok</th>
<th>Aksi</th>
</tr>

@foreach($buku as $item)

<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $item['judul'] }}</td>
<td>{{ $item['pengarang'] }}</td>
<td>{{ $item['penerbit'] }}</td>
<td>{{ $item['kategori'] }}</td>
<td>{{ $item['stok'] }}</td>

<td>

<a href="{{ route('petugas.edit',$item['id']) }}">
Edit
</a>

|

<a href="{{ route('petugas.delete',$item['id']) }}"
onclick="return confirm('hapus?')">
Hapus
</a>

</td>

</tr>

@endforeach

</table>

@endsection

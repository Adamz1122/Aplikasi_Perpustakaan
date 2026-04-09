@extends('layouts.petugas')

@section('title','Data Anggota')

@section('content')

<a href="{{ route('petugas.anggota.create') }}"
style="background:#7b4b2a;color:white;padding:10px;border-radius:8px;text-decoration:none;">
+ Tambah Anggota
</a>

<br><br>

<div class="table-box">

<table>

<tr>
<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Aksi</th>
</tr>

@foreach($anggota as $a)

<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $a->name }}</td>
<td>{{ $a->email }}</td>

<td>
<a href="{{ route('petugas.anggota.edit',$a->id) }}">Edit</a>
|
<a href="{{ route('petugas.anggota.delete',$a->id) }}">Hapus</a>
</td>

</tr>

@endforeach

</table>

</div>

@endsection

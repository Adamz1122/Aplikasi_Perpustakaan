@extends('layouts.kepala')

@section('title','Data Petugas')

@section('content')

<div class="table-box">

<div style="display:flex;justify-content:space-between;margin-bottom:15px;">
<h3>Data Petugas</h3>

<a href="{{ route('kepala.petugas.create') }}"
style="background:#3cc7a7;color:white;padding:8px 15px;border-radius:5px;text-decoration:none;">
+ Tambah Petugas
</a>

</div>

<table>

<tr>
<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Aksi</th>
</tr>

@foreach($petugas as $p)

<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $p->name }}</td>
<td>{{ $p->email }}</td>

<td>

<a href="{{ route('kepala.petugas.edit',$p->id) }}"
style="background:orange;color:white;padding:5px 10px;border-radius:5px;">
Edit
</a>

<a href="{{ route('kepala.petugas.delete',$p->id) }}"
style="background:red;color:white;padding:5px 10px;border-radius:5px;">
Hapus
</a>

</td>

</tr>

@endforeach

</table>

</div>

@endsection

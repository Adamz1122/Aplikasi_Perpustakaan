@extends('layouts.petugas')

@section('title','Tambah Anggota')

@section('content')

<div class="table-box">

<h3>Tambah Anggota</h3>

<form method="POST" action="{{ route('petugas.anggota.store') }}">
@csrf

<label>Nama</label>
<br>
<input type="text" name="name" required>
<br><br>

<label>Email</label>
<br>
<input type="email" name="email" required>
<br><br>

<label>Password</label>
<br>
<input type="password" name="password" required>
<br><br>

<button type="submit">Simpan</button>

</form>

</div>

@endsection

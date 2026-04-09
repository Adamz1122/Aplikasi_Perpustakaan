@extends('layouts.kepala')

@section('title','Tambah Petugas')

@section('content')

<div class="table-box">

<h3>Tambah Petugas</h3>

<form method="POST" action="{{ route('kepala.petugas.store') }}">

@csrf

<div>
<label>Nama</label>
<input type="text" name="name" required>
</div>

<br>

<div>
<label>Email</label>
<input type="email" name="email" required>
</div>

<br>

<div>
<label>Password</label>
<input type="password" name="password" required>
</div>

<br>

<button>Simpan</button>

</form>

</div>

@endsection

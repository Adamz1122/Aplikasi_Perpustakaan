@extends('layouts.petugas')

@section('title','Edit Anggota')

@section('content')

<div class="table-box">

<h3>Edit Anggota</h3>

<form method="POST" action="{{ route('petugas.anggota.update',$anggota->id) }}">
@csrf

<label>Nama</label>
<br>
<input type="text" name="name" value="{{ $anggota->name }}">
<br><br>

<label>Email</label>
<br>
<input type="email" name="email" value="{{ $anggota->email }}">
<br><br>

<button type="submit">Update</button>

</form>

</div>

@endsection

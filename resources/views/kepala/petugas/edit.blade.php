@extends('layouts.kepala')

@section('title','Edit Petugas')

@section('content')

<div class="table-box">

<h3>Edit Petugas</h3>

<form method="POST" action="{{ route('kepala.petugas.update',$petugas->id) }}">

@csrf

<div>
<label>Nama</label>
<input type="text" name="name" value="{{ $petugas->name }}">
</div>

<br>

<div>
<label>Email</label>
<input type="email" name="email" value="{{ $petugas->email }}">
</div>

<br>

<button>Update</button>

</form>

</div>

@endsection

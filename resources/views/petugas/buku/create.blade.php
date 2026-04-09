@extends('layouts.petugas')

@section('title','Tambah Buku')

@section('content')

<h2>Tambah Buku</h2>

<form method="POST" action="{{ route('petugas.buku.store') }}" enctype="multipart/form-data">
@csrf

<label>Judul</label>
<input type="text" name="judul" required>
<br><br>

<label>Pengarang</label>
<input type="text" name="pengarang" required>
<br><br>

<label>Penerbit</label>
<input type="text" name="penerbit" required>
<br><br>

<label>Kategori</label>
<input type="text" name="kategori" required>
<br><br>

<label>Tahun Terbit</label>
<input type="number" name="tahun_terbit" required>
<br><br>

<label>Stok</label>
<input type="number" name="stok" required>
<br><br>

<label>Deskripsi</label>
<textarea name="deskripsi"></textarea>
<br><br>

<label>Gambar</label>
<input type="file" name="gambar">
<br><br>

<button type="submit">Tambah Buku</button>

</form>

@endsection

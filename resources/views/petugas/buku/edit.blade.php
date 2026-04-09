@extends('layouts.petugas')

@section('title','Edit Buku')

@section('content')

<h2>Edit Buku</h2>

<form method="POST" action="{{ route('petugas.buku.update',$buku->id) }}" enctype="multipart/form-data">
@csrf

<label>Judul</label>
<input type="text" name="judul" value="{{ $buku->judul }}" required>
<br><br>

<label>Pengarang</label>
<input type="text" name="pengarang" value="{{ $buku->pengarang }}" required>
<br><br>

<label>Penerbit</label>
<input type="text" name="penerbit" value="{{ $buku->penerbit }}" required>
<br><br>

<label>Kategori</label>
<input type="text" name="kategori" value="{{ $buku->kategori }}" required>
<br><br>

<label>Tahun Terbit</label>
<input type="number" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" required>
<br><br>

<label>Stok</label>
<input type="number" name="stok" value="{{ $buku->stok }}" required>
<br><br>

<label>Deskripsi</label>
<textarea name="deskripsi">{{ $buku->deskripsi }}</textarea>
<br><br>

<label>Gambar</label>
<br>

@if($buku->gambar)
<img src="{{ asset('storage/'.$buku->gambar) }}" width="100">
<br><br>
@endif

<input type="file" name="gambar">
<br><br>

<button type="submit">Update Buku</button>

</form>

@endsection

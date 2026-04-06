@extends('layouts.app')

@section('content')

<h2>{{ $buku->judul }}</h2>

<img src="{{ asset('storage/'.$buku->gambar) }}" width="200">

<p>Pengarang : {{ $buku->pengarang }}</p>
<p>Penerbit : {{ $buku->penerbit }}</p>
<p>Kategori : {{ $buku->kategori }}</p>
<p>Stok : {{ $buku->stok }}</p>

<a href="{{ route('anggota.pinjam',$buku->id) }}" class="pinjam-btn">
Pinjam Buku
</a>

@endsection

@extends('layouts.app')

@section('content')

<h2>Pinjam Buku</h2>

<form method="POST" action="{{route('anggota.pinjam.store',$buku->id)}}" class="form-pinjam">

@csrf

<input type="hidden" name="buku_id" value="{{ $buku->id }}">
<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

<label>Nama Peminjam</label>
<input type="text" value="{{ auth()->user()->name }}" readonly>

<label>Judul Buku</label>
<input type="text" value="{{ $buku->judul }}" readonly>

<label>Tanggal Pinjam</label>
<input type="date" name="tanggal_pinjam" required>

<label>Tanggal Kembali</label>
<input type="date" name="tanggal_kembali" required>

<label>Jumlah</label>
<input type="number" name="jumlah" required>

<button type="submit" class="btn-pinjam">Pinjam Buku</button>

</form>

@endsection

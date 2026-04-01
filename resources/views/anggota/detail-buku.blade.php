@extends('layouts.app')

@section('content')

<div style="background:white;padding:20px;border-radius:10px;">

<h2>Detail Buku</h2>

<img src="/images/buku1.jpg" width="200">

<h3>Laravel Untuk Pemula</h3>

<p>
Buku ini membahas dasar dasar Laravel untuk pemula
</p>

<a href="{{route('anggota.pinjam',1)}}">
<button>Pinjam Buku</button>
</a>

</div>

@endsection

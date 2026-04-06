@extends('layouts.app')

@section('title','Daftar Buku')

@section('content')

<!-- SEARCH -->
<div class="search-bar">
<input type="text" placeholder="Search">
🔍
</div>

<!-- DAFTAR BUKU -->
<div class="buku-grid">

@foreach($buku as $item)

<div class="buku-card">

<div class="favorite">🤎</div>

<img src="{{ asset('storage/'.$item->gambar) }}" class="buku-img">

<div class="buku-info">

<h3>{{$item->judul}}</h3>

<p>Author: {{$item->pengarang}}</p>
<p>Category: {{$item->kategori}}</p>
<p>Publisher: {{$item->penerbit}}</p>
<p>Available: {{$item->stok}} books</p>

<a href="{{route('anggota.detail-buku',$item->id)}}" class="detail-btn">
View Detail
</a>

</div>

</div>

@endforeach

</div>

@endsection

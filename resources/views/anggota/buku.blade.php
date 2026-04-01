@extends('layouts.app')

@section('title','Daftar Buku')

@section('content')

<style>

.search-bar{
display:flex;
align-items:center;
background:#7b4b2a;
padding:10px 20px;
border-radius:25px;
color:white;
margin-bottom:20px;
}

.search-bar input{
flex:1;
border:none;
background:none;
color:white;
outline:none;
}

.filter{
display:flex;
gap:20px;
margin-bottom:25px;
}

.filter button{
padding:10px 20px;
border:none;
border-radius:12px;
background:white;
box-shadow:0 2px 5px rgba(0,0,0,0.1);
cursor:pointer;
}

.buku-grid{
display:grid;
grid-template-columns:repeat(auto-fill,minmax(420px,1fr));
gap:20px;
}

.buku-card{
display:flex;
background:white;
padding:15px;
border-radius:15px;
box-shadow:0 4px 10px rgba(0,0,0,0.1);
position:relative;
}

.buku-card img{
width:120px;
height:160px;
object-fit:cover;
border-radius:10px;
margin-right:15px;
}

.buku-info h3{
margin:0;
}

.buku-info p{
margin:3px 0;
font-size:14px;
color:#555;
}

.detail-btn{
margin-top:10px;
padding:7px 15px;
border:none;
border-radius:20px;
background:#eee;
cursor:pointer;
}

.favorite{
position:absolute;
top:10px;
right:10px;
background:white;
padding:8px;
border-radius:50%;
box-shadow:0 2px 5px rgba(0,0,0,0.2);
cursor:pointer;
}

</style>

<!-- SEARCH -->
<div class="search-bar">
<input type="text" placeholder="Search">
🔍
</div>

<!-- FILTER -->
<div class="filter">
<button>Favorit</button>
<button>Category</button>
<button>Status</button>
</div>

<!-- DAFTAR BUKU -->
<div class="buku-grid">

@foreach($buku as $item)

<div class="buku-card">

<div class="favorite">🤎</div>

<img src="/images/{{$item['gambar']}}">

<div class="buku-info">

<h3>{{$item['judul']}}</h3>

<p>Author: {{$item['pengarang']}}</p>
<p>Category: {{$item['kategori']}}</p>
<p>Publisher: {{$item['penerbit']}}</p>
<p>Available: {{$item['stok']}} books</p>

<a href="{{route('anggota.detail',$item['id'])}}">
<button class="detail-btn">View Detail</button>
</a>

</div>

</div>

@endforeach

</div>

@endsection

# layouts/kepala.blade.php

```html
<!DOCTYPE html>
<html>
<head>
<title>@yield('title', 'Dashboard Kepala')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body {
margin: 0;
font-family: Arial, sans-serif;
display: flex;
background: #f5f5f5;
}

/* SIDEBAR */
.sidebar {
width: 250px;
background: #7b4b2a;
color: white;
height: 100vh;
display: flex;
flex-direction: column;
justify-content: space-between;
padding: 20px;
}

.logo {
font-weight: bold;
font-size: 18px;
margin-bottom: 30px;
text-align: center;
}

.menu a {
display: block;
color: white;
text-decoration: none;
padding: 12px;
margin-bottom: 10px;
border-radius: 8px;
transition: 0.3s;
}

.menu a:hover {
background: #a86b45;
}

.active {
background: #a86b45;
}

/* Logout */
.logout-btn {
background: #ff4d4f;
border: none;
color: white;
cursor: pointer;
padding: 10px;
width: 100%;
border-radius: 8px;
font-weight: bold;
}

.logout-btn:hover {
background: #e33f3f;
}

/* MAIN */
.main {
flex: 1;
padding: 20px;
}

.topbar {
display: flex;
justify-content: space-between;
margin-bottom: 20px;
}

.user {
font-weight: bold;
}

/* Card */
.cards{
display:flex;
gap:20px;
margin-bottom:20px;
}

.card{
flex:1;
padding:20px;
border-radius:10px;
color:white;
}

.card-blue{
background:#4e8dd1;
}

.card-green{
background:#3cc7a7;
}

.card-orange{
background:#f39c4a;
}

.card h2{
margin-top:10px;
}

/* Table */
.table-box{
background:white;
padding:20px;
border-radius:10px;
}

table{
width:100%;
border-collapse:collapse;
}

table th, table td{
padding:10px;
border:1px solid #ddd;
}

</style>

</head>

<body>

<!-- Sidebar -->
<div class="sidebar">

<div>

<div class="logo">
📚 Perpustakaan Digital
</div>

<div class="menu">

<a href="{{ route('kepala.dashboard') }}">
🏠 Dashboard
</a>

<a href="{{ route('kepala.petugas') }}">
👨‍💼 Data Petugas
</a>

<a href="{{ route('kepala.peminjaman') }}">
📚 Data Peminjaman
</a>

<a href="{{ route('kepala.laporan') }}">
📊 Laporan
</a>

</div>

</div>

<form action="{{ route('logout') }}" method="POST">
@csrf
<button class="logout-btn">
🔌 Logout
</button>
</form>

</div>

<!-- Main -->
<div class="main">

<div class="topbar">

<div>
<h2>@yield('title')</h2>
</div>

<div class="user">
👤 {{ auth()->user()->name }}
</div>

</div>

@yield('content')

</div>

</body>
</html>
```

---

# Contoh Dashboard Kepala

`resources/views/kepala/dashboard.blade.php`

```html
@extends('layouts.kepala')

@section('title','Dashboard Kepala')

@section('content')

<div class="cards">

<div class="card card-blue">
Total Petugas
<h2>5</h2>
</div>

<div class="card card-green">
Total Peminjaman
<h2>20</h2>
</div>

<div class="card card-orange">
Total Buku
<h2>50</h2>
</div>

</div>

<div class="table-box">
<h3>Peminjaman Terbaru</h3>

<table>
<tr>
<th>Nama</th>
<th>Buku</th>
<th>Tanggal</th>
<th>Status</th>
</tr>

<tr>
<td>Ahmad</td>
<td>Laravel Dasar</td>
<td>10-04-2026</td>
<td>Dipinjam</td>
</tr>

</table>

</div>

@endsection
```

---

# Route yang dibutuhkan

```php
Route::prefix('kepala')->group(function(){

Route::get('/dashboard',[KepalaController::class,'dashboard'])->name('kepala.dashboard');
Route::get('/petugas',[KepalaController::class,'petugas'])->name('kepala.petugas');
Route::get('/peminjaman',[KepalaController::class,'peminjaman'])->name('kepala.peminjaman');
Route::get('/laporan',[KepalaController::class,'laporan'])->name('kepala.laporan');

});
```

---

Kalau mau aku juga bisa bantu:

* Controller Kepala
* Tampilan Data Petugas
* Tampilan Laporan
* Grafik laporan

Tinggal b

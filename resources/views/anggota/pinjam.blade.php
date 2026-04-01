@extends('layouts.app')

@section('content')

<div style="background:white;padding:20px;border-radius:10px;">

<h2>Form Pinjam Buku</h2>

<form method="POST">
@csrf

<label>Tanggal Pinjam</label>
<br>
<input type="date" name="tgl_pinjam" required>
<br><br>

<label>Tanggal Kembali</label>
<br>
<input type="date" name="tgl_kembali" required>

<br><br>

<button type="submit">
Pinjam Buku
</button>

</form>

</div>

@endsection

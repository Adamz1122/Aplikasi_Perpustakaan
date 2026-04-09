<!DOCTYPE html>
<html>
<head>
<title>Laporan Peminjaman</title>

<style>

body{
font-family: Arial;
}

table{
width:100%;
border-collapse: collapse;
}

table, th, td{
border:1px solid black;
padding:8px;
}

h2{
text-align:center;
}

</style>

</head>

<body>

<h2>Laporan Peminjaman Buku</h2>

<table>

<tr>
<th>No</th>
<th>Nama</th>
<th>Buku</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Status</th>
<th>Denda</th>
</tr>

@foreach($peminjaman as $p)

<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $p->user->name ?? '-' }}</td>
<td>{{ $p->buku->judul ?? '-' }}</td>
<td>{{ $p->tanggal_pinjam }}</td>
<td>{{ $p->tanggal_kembali ?? '-' }}</td>
<td>{{ $p->status }}</td>
<td>
Rp {{ number_format($p->denda ?? 0,0,',','.') }}
</td>
</tr>

@endforeach

</table>

</body>
</html>

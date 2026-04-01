<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
{
$buku = [

[
'id'=>1,
'judul'=>'Matematika Kelas 10',
'pengarang'=>'Budi Santoso',
'penerbit'=>'Erlangga',
'kategori'=>'Science',
'stok'=>3,
'gambar'=>'buku1.jpg'
],

[
'id'=>2,
'judul'=>'New Educators',
'pengarang'=>'Budi Santoso',
'penerbit'=>'Erlangga',
'kategori'=>'Science',
'stok'=>3,
'gambar'=>'buku2.jpg'
],

];

return view('anggota.buku',compact('buku'));

}
    public function detail($id)
    {
        return view('anggota.detail-buku');
    }

    public function pinjam($id)
    {
        return view('anggota.pinjam');
    }

    public function store(Request $request, $id)
    {
        return redirect()->route('anggota.buku')->with('success','Buku berhasil dipinjam');
    }
}

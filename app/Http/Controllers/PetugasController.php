<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;

class PetugasController extends Controller
{

// =====================
// DASHBOARD
// =====================

public function dashboard()
{
$jumlahBuku = Buku::count();

$jumlahDipinjam = Peminjaman::where('status','dipinjam')->count();

$jumlahAnggota = User::where('role','anggota')->count();

$peminjaman = Peminjaman::latest()->take(5)->get();

return view('petugas.dashboard',compact(
'jumlahBuku',
'jumlahDipinjam',
'jumlahAnggota',
'peminjaman'
));
}

// ======================
// BUKU
// ======================

public function buku()
{
$buku = Buku::all();
return view('petugas.buku.index', compact('buku'));
}

public function createBuku()
{
return view('petugas.buku.create');
}

public function storeBuku(Request $request)
{
$gambar = null;

if ($request->hasFile('gambar')) {
$gambar = $request->file('gambar')->store('buku','public');
}

Buku::create([
'judul'=>$request->judul,
'pengarang'=>$request->pengarang,
'penerbit'=>$request->penerbit,
'kategori'=>$request->kategori,
'tahun_terbit'=>$request->tahun_terbit,
'stok'=>$request->stok,
'deskripsi'=>$request->deskripsi,
'gambar'=>$gambar
]);

return redirect()->route('petugas.buku');
}

public function editBuku($id)
{
$buku = Buku::find($id);
return view('petugas.buku.edit',compact('buku'));
}

public function updateBuku(Request $request,$id)
{
$buku = Buku::find($id);

if ($request->hasFile('gambar')) {
$gambar = $request->file('gambar')->store('buku','public');
$buku->gambar = $gambar;
}

$buku->update([
'judul'=>$request->judul,
'pengarang'=>$request->pengarang,
'penerbit'=>$request->penerbit,
'kategori'=>$request->kategori,
'tahun_terbit'=>$request->tahun_terbit,
'stok'=>$request->stok,
'deskripsi'=>$request->deskripsi
]);

return redirect()->route('petugas.buku');
}

public function deleteBuku($id)
{
Buku::destroy($id);
return redirect()->route('petugas.buku');
}


// =====================
// ANGGOTA
// =====================

public function anggota()
{
$anggota = User::where('role','anggota')->get();
return view('petugas.anggota.index',compact('anggota'));
}


public function createAnggota()
{
return view('petugas.anggota.create');
}


public function storeAnggota(Request $request)
{
User::create([
'name'=>$request->name,
'email'=>$request->email,
'password'=>bcrypt($request->password),
'role'=>'anggota'
]);

return redirect()->route('petugas.anggota');
}


public function editAnggota($id)
{
$anggota = User::find($id);
return view('petugas.anggota.edit',compact('anggota'));
}


public function updateAnggota(Request $request,$id)
{
$anggota = User::find($id);

$anggota->update([
'name'=>$request->name,
'email'=>$request->email
]);

return redirect()->route('petugas.anggota');
}


public function deleteAnggota($id)
{
User::destroy($id);
return redirect()->route('petugas.anggota');
}

// =====================
// AKTIVITAS
// =====================

public function aktivitas()
{
    // pengajuan pinjam
    $peminjaman = Peminjaman::where('status','menunggu')->get();

    // pengajuan pengembalian
    $pengembalian = Peminjaman::where('status','menunggu_kembali')->get();

    return view('petugas.aktivitas',compact('peminjaman','pengembalian'));
}

// =====================
// TERIMA PINJAM
// =====================

public function terimaPinjam($id)
{
    $p = Peminjaman::findOrFail($id);
    $buku = Buku::find($p->id_buku);

    // cek stok
    if($p->jumlah > $buku->stok){
        return back()->with('error','Stok tidak cukup!');
    }

    $p->status = 'dipinjam';
    $p->save();

    // kurangi stok
    $buku->stok -= $p->jumlah;
    $buku->save();

    return redirect()->route('petugas.aktivitas')
        ->with('success','Peminjaman disetujui');
}

// =====================
// TOLAK PINJAM
// =====================
public function tolakPinjam($id)
{
    $p = Peminjaman::findOrFail($id);

    $p->status = 'ditolak';
    $p->save();

    return redirect()->route('petugas.aktivitas')
        ->with('success','Peminjaman ditolak');
}

// =====================
// KONFIRMASI PENGEMBALIAN
// =====================

public function konfirmasiKembali($id)
{
    $p = Peminjaman::findOrFail($id);
    $buku = Buku::find($p->id_buku);

    $p->status = 'dikembalikan';
    $p->save();

    // kembalikan stok
    $buku->stok += $p->jumlah;
    $buku->save();

    return redirect()->route('petugas.aktivitas')
        ->with('success','Buku berhasil dikembalikan');
}

// =====================
// RIWAYAT
// =====================

public function riwayat()
{
$peminjaman = Peminjaman::latest()->get();

return view('petugas.riwayat',compact('peminjaman'));
}


}

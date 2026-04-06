<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function pinjam($id)
    {
        $buku = Buku::findOrFail($id);
        return view('anggota.pinjam', compact('buku'));
    }

    public function store(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        Peminjaman::create([
            'id_user' => auth()->id(),
            'id_buku' => $id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'jumlah' => $request->jumlah,
            'status' => 'dipinjam'
        ]);

        // Kurangi stok
        $buku->stok -= $request->jumlah;
        $buku->save();

        return redirect()->route('anggota.buku')
        ->with('success','Buku berhasil dipinjam');


    }
        public function index()
        {
        $peminjaman = Peminjaman::where('id_user', auth()->id())
        ->where('status','dipinjam')
        ->with('buku')
        ->get();

        return view('anggota.peminjaman', compact('peminjaman'));
    }

public function kembali($id)
{
$peminjaman = Peminjaman::findOrFail($id);

$buku = Buku::find($peminjaman->id_buku);

$tgl_kembali = Carbon::parse($peminjaman->tanggal_kembali);
$hari_ini = Carbon::now();

$denda = 0;

if($hari_ini > $tgl_kembali){
$terlambat = $tgl_kembali->diffInDays($hari_ini);
$denda = $terlambat * 1000;
}

$peminjaman->denda = $denda;
$peminjaman->status = 'dikembalikan';
$peminjaman->save();

$buku->stok += $peminjaman->jumlah;
$buku->save();

return redirect()->back()->with('success','Buku dikembalikan');
}

public function riwayat()
{
    $riwayat = Peminjaman::where('id_user', auth()->id())
    ->where('status','dikembalikan')
    ->with('buku')
    ->get();

    return view('anggota.riwayat', compact('riwayat'));
}

public function hapusRiwayat($id)
{
    Peminjaman::findOrFail($id)->delete();

    return redirect()->back()->with('success','Riwayat dihapus');
}
}

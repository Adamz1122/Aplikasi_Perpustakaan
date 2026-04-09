<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{

    // =======================
// DASHBOARD
// =======================
    public function dashboard()
    {
        $jumlahBuku = Buku::count();

        $dipinjam = Peminjaman::where('user_id', auth()->id())
            ->where('status', 'dipinjam')
            ->count();

        $riwayat = Peminjaman::where('user_id', auth()->id())->count();

        $peminjaman = Peminjaman::where('user_id', auth()->id())
            ->latest()
            ->take(5)
            ->get();

        return view('anggota.dashboard', compact(
            'jumlahBuku',
            'dipinjam',
            'riwayat',
            'peminjaman'
        ));
    }

    // =======================
// KATALOG BUKU
// =======================
    public function buku()
    {
        $buku = Buku::all();

        return view('anggota.buku', compact('buku'));
    }


    // =======================
// DETAIL BUKU
// =======================
    public function detail($id)
    {
        $buku = Buku::findOrFail($id);

        return view('anggota.detail-buku', compact('buku'));
    }

    public function peminjaman()
    {
        $peminjaman = Peminjaman::where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->get();

        return view('anggota.peminjaman', compact('peminjaman'));
    }

}

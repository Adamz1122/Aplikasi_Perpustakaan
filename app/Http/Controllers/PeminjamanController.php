<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{

    public function peminjaman()
    {
        $peminjaman = Peminjaman::where('user_id', Auth::id())
            ->whereIn('status', [
                'menunggu',
                'dipinjam',
                'menunggu_kembali'
            ])
            ->with('buku')
            ->latest()
            ->get();

        return view('anggota.peminjaman', compact('peminjaman'));
    }
    // =====================
    // FORM PINJAM
    // =====================
    public function pinjam($id)
    {
        $buku = Buku::findOrFail($id);
        return view('anggota.pinjam', compact('buku'));
    }

    // =====================
    // SIMPAN PINJAMAN (STATUS: MENUNGGU)
    // =====================
    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required',
            'tanggal_kembali' => 'required|date',
            'jumlah' => 'required|integer|min:1|max:3',
        ]);

        $tanggalPinjam = Carbon::today();
        $tanggalKembali = Carbon::parse($request->tanggal_kembali);

        // 🔴 RULE 1: maksimal 7 hari
        if ($tanggalKembali->diffInDays($tanggalPinjam) > 7) {
            return back()->with('error', 'Maksimal peminjaman hanya 7 hari!');
        }

        // 🔴 RULE 2: jumlah maksimal 3
        if ($request->jumlah > 3) {
            return back()->with('error', 'Maksimal peminjaman buku adalah 3!');
        }

        Peminjaman::create([
            'id_buku' => $request->id_buku,
            'user_id' => Auth::id(),
            'tanggal_pinjam' => $tanggalPinjam,
            'tanggal_kembali' => $tanggalKembali,
            'jumlah' => $request->jumlah,

            // 🔥 FIX UTAMA
            'status' => 'menunggu'
        ]);

        return redirect()->route('anggota.dashboard')
            ->with('success', 'Pengajuan berhasil, menunggu persetujuan petugas!');
    }

    // =====================
    // PETUGAS: SETUJUI PINJAMAN
    // =====================
    public function setujui($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status' => 'dipinjam'
        ]);

        return back()->with('success', 'Peminjaman disetujui');
    }

    // =====================
    // PETUGAS: TOLAK PINJAMAN
    // =====================
    public function tolak($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status' => 'ditolak'
        ]);

        return back()->with('success', 'Peminjaman ditolak');
    }

    // =====================
    // AJUKAN PENGEMBALIAN (ANGGOTA)
    // =====================
    public function ajukanKembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status' => 'menunggu_kembali'
        ]);

        return back()->with('success', 'Menunggu konfirmasi pengembalian');
    }

    // =====================
    // PETUGAS: KONFIRMASI PENGEMBALIAN + HITUNG DENDA
    // =====================
    public function kembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $hariIni = Carbon::today();
        $jatuhTempo = Carbon::parse($peminjaman->tanggal_kembali);

        $denda = 0;

        // 🔴 hitung denda jika telat
        if ($hariIni->gt($jatuhTempo)) {
            $telatHari = $hariIni->diffInDays($jatuhTempo);
            $denda = $telatHari * 1000;
        }

        $peminjaman->update([
            'status' => 'dikembalikan',
            'tanggal_dikembalikan' => $hariIni,
            'denda' => $denda,
        ]);

        return back()->with('success', 'Buku dikembalikan. Denda: Rp ' . number_format($denda));
    }

    // =====================
    // RIWAYAT
    // =====================
    public function riwayat()
    {
        $riwayat = Peminjaman::where('user_id', Auth::id())
            ->whereIn('status', ['dikembalikan', 'ditolak'])
            ->with('buku')
            ->get();

        return view('anggota.riwayat', compact('riwayat'));
    }

    // =====================
    // HAPUS RIWAYAT
    // =====================
    public function hapusRiwayat($id)
    {
        Peminjaman::findOrFail($id)->delete();

        return back()->with('success', 'Riwayat dihapus');
    }
}
